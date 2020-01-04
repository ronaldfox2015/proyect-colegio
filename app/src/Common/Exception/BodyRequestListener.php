<?php


namespace App\Common\Exception;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\Exception\HttpException;

/**
 * Class BodyRequestListener
 * @package AppBundle\EventListener
 */
class BodyRequestListener
{
    /**
     * @param GetResponseEvent $event
     * @throws HttpException
     */
    public function onKernelRequest(GetResponseEvent $event)
    {
        $request = $event->getRequest();
        if ($this->containsHeader($request, 'Content-Type', 'application/json')) {
            $jsonData = json_decode($request->getContent(), true);
            if (!$jsonData) {
                throw new HttpException(Response::HTTP_BAD_REQUEST, "Invalid json data");
            }
            $jsonDataLowerCase = array();
            foreach ($jsonData as $key => $value) {
                $jsonDataLowerCase[preg_replace_callback('/_(.)/', create_function('$matches', 'return strtoupper($matches[1]);'), $key)] = $value;
            }
            $request->request->replace($jsonDataLowerCase);
        }
    }
    /**
     * @param Request $request
     * @param $name
     * @param $value
     * @return bool
     */
    private function containsHeader(Request $request, $name, $value)
    {
        return 0 === strpos($request->headers->get($name), $value);
    }
}