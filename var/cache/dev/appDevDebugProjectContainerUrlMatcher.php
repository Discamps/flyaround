<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevDebugProjectContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($rawPathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($rawPathinfo);
        $trimmedPathinfo = rtrim($pathinfo, '/');
        $context = $this->context;
        $request = $this->request ?: $this->createRequest($pathinfo);
        $requestMethod = $canonicalMethod = $context->getMethod();

        if ('HEAD' === $requestMethod) {
            $canonicalMethod = 'GET';
        }

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if ('/_profiler' === $trimmedPathinfo) {
                    $ret = array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                    if ('/' === substr($pathinfo, -1)) {
                        // no-op
                    } elseif ('GET' !== $canonicalMethod) {
                        goto not__profiler_home;
                    } else {
                        return array_replace($ret, $this->redirect($rawPathinfo.'/', '_profiler_home'));
                    }

                    return $ret;
                }
                not__profiler_home:

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ('/_profiler/search' === $pathinfo) {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ('/_profiler/search_bar' === $pathinfo) {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_phpinfo
                if ('/_profiler/phpinfo' === $pathinfo) {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler_open_file
                if ('/_profiler/open' === $pathinfo) {
                    return array (  '_controller' => 'web_profiler.controller.profiler:openAction',  '_route' => '_profiler_open_file',);
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        // homepage
        if ('' === $trimmedPathinfo) {
            $ret = array (  '_controller' => 'AppBundle\\Controller\\DefaultController::indexAction',  '_route' => 'homepage',);
            if ('/' === substr($pathinfo, -1)) {
                // no-op
            } elseif ('GET' !== $canonicalMethod) {
                goto not_homepage;
            } else {
                return array_replace($ret, $this->redirect($rawPathinfo.'/', 'homepage'));
            }

            return $ret;
        }
        not_homepage:

        if (0 === strpos($pathinfo, '/flight')) {
            // flight_index
            if ('/flight' === $trimmedPathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\FlightController::indexAction',  '_route' => 'flight_index',);
                if ('/' === substr($pathinfo, -1)) {
                    // no-op
                } elseif ('GET' !== $canonicalMethod) {
                    goto not_flight_index;
                } else {
                    return array_replace($ret, $this->redirect($rawPathinfo.'/', 'flight_index'));
                }

                if (!in_array($canonicalMethod, array('GET'))) {
                    $allow = array_merge($allow, array('GET'));
                    goto not_flight_index;
                }

                return $ret;
            }
            not_flight_index:

            // flight_new
            if ('/flight/new' === $pathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\FlightController::newAction',  '_route' => 'flight_new',);
                if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                    $allow = array_merge($allow, array('GET', 'POST'));
                    goto not_flight_new;
                }

                return $ret;
            }
            not_flight_new:

            // flight_show
            if (preg_match('#^/flight/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'flight_show')), array (  '_controller' => 'AppBundle\\Controller\\FlightController::showAction',));
                if (!in_array($canonicalMethod, array('GET'))) {
                    $allow = array_merge($allow, array('GET'));
                    goto not_flight_show;
                }

                return $ret;
            }
            not_flight_show:

            // flight_edit
            if (preg_match('#^/flight/(?P<id>[^/]++)/edit$#sD', $pathinfo, $matches)) {
                $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'flight_edit')), array (  '_controller' => 'AppBundle\\Controller\\FlightController::editAction',));
                if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                    $allow = array_merge($allow, array('GET', 'POST'));
                    goto not_flight_edit;
                }

                return $ret;
            }
            not_flight_edit:

            // flight_delete
            if (preg_match('#^/flight/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'flight_delete')), array (  '_controller' => 'AppBundle\\Controller\\FlightController::deleteAction',));
                if (!in_array($requestMethod, array('DELETE'))) {
                    $allow = array_merge($allow, array('DELETE'));
                    goto not_flight_delete;
                }

                return $ret;
            }
            not_flight_delete:

        }

        elseif (0 === strpos($pathinfo, '/planemodel')) {
            // planemodel_index
            if ('/planemodel' === $trimmedPathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\PlaneModelController::indexAction',  '_route' => 'planemodel_index',);
                if ('/' === substr($pathinfo, -1)) {
                    // no-op
                } elseif ('GET' !== $canonicalMethod) {
                    goto not_planemodel_index;
                } else {
                    return array_replace($ret, $this->redirect($rawPathinfo.'/', 'planemodel_index'));
                }

                if (!in_array($canonicalMethod, array('GET'))) {
                    $allow = array_merge($allow, array('GET'));
                    goto not_planemodel_index;
                }

                return $ret;
            }
            not_planemodel_index:

            // planemodel_new
            if ('/planemodel/new' === $pathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\PlaneModelController::newAction',  '_route' => 'planemodel_new',);
                if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                    $allow = array_merge($allow, array('GET', 'POST'));
                    goto not_planemodel_new;
                }

                return $ret;
            }
            not_planemodel_new:

            // planemodel_show
            if (preg_match('#^/planemodel/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'planemodel_show')), array (  '_controller' => 'AppBundle\\Controller\\PlaneModelController::showAction',));
                if (!in_array($canonicalMethod, array('GET'))) {
                    $allow = array_merge($allow, array('GET'));
                    goto not_planemodel_show;
                }

                return $ret;
            }
            not_planemodel_show:

            // planemodel_edit
            if (preg_match('#^/planemodel/(?P<id>[^/]++)/edit$#sD', $pathinfo, $matches)) {
                $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'planemodel_edit')), array (  '_controller' => 'AppBundle\\Controller\\PlaneModelController::editAction',));
                if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                    $allow = array_merge($allow, array('GET', 'POST'));
                    goto not_planemodel_edit;
                }

                return $ret;
            }
            not_planemodel_edit:

            // planemodel_delete
            if (preg_match('#^/planemodel/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'planemodel_delete')), array (  '_controller' => 'AppBundle\\Controller\\PlaneModelController::deleteAction',));
                if (!in_array($requestMethod, array('DELETE'))) {
                    $allow = array_merge($allow, array('DELETE'));
                    goto not_planemodel_delete;
                }

                return $ret;
            }
            not_planemodel_delete:

        }

        elseif (0 === strpos($pathinfo, '/reservation')) {
            // reservation_index
            if ('/reservation' === $trimmedPathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\ReservationController::indexAction',  '_route' => 'reservation_index',);
                if ('/' === substr($pathinfo, -1)) {
                    // no-op
                } elseif ('GET' !== $canonicalMethod) {
                    goto not_reservation_index;
                } else {
                    return array_replace($ret, $this->redirect($rawPathinfo.'/', 'reservation_index'));
                }

                if (!in_array($canonicalMethod, array('GET'))) {
                    $allow = array_merge($allow, array('GET'));
                    goto not_reservation_index;
                }

                return $ret;
            }
            not_reservation_index:

            // reservation_new
            if ('/reservation/new' === $pathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\ReservationController::newAction',  '_route' => 'reservation_new',);
                if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                    $allow = array_merge($allow, array('GET', 'POST'));
                    goto not_reservation_new;
                }

                return $ret;
            }
            not_reservation_new:

            // reservation_show
            if (preg_match('#^/reservation/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'reservation_show')), array (  '_controller' => 'AppBundle\\Controller\\ReservationController::showAction',));
                if (!in_array($canonicalMethod, array('GET'))) {
                    $allow = array_merge($allow, array('GET'));
                    goto not_reservation_show;
                }

                return $ret;
            }
            not_reservation_show:

            // reservation_edit
            if (preg_match('#^/reservation/(?P<id>[^/]++)/edit$#sD', $pathinfo, $matches)) {
                $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'reservation_edit')), array (  '_controller' => 'AppBundle\\Controller\\ReservationController::editAction',));
                if (!in_array($canonicalMethod, array('GET', 'POST'))) {
                    $allow = array_merge($allow, array('GET', 'POST'));
                    goto not_reservation_edit;
                }

                return $ret;
            }
            not_reservation_edit:

            // reservation_delete
            if (preg_match('#^/reservation/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'reservation_delete')), array (  '_controller' => 'AppBundle\\Controller\\ReservationController::deleteAction',));
                if (!in_array($requestMethod, array('DELETE'))) {
                    $allow = array_merge($allow, array('DELETE'));
                    goto not_reservation_delete;
                }

                return $ret;
            }
            not_reservation_delete:

        }

        elseif (0 === strpos($pathinfo, '/site')) {
            // site_index
            if ('/site' === $trimmedPathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\SiteController::indexAction',  '_route' => 'site_index',);
                if ('/' === substr($pathinfo, -1)) {
                    // no-op
                } elseif ('GET' !== $canonicalMethod) {
                    goto not_site_index;
                } else {
                    return array_replace($ret, $this->redirect($rawPathinfo.'/', 'site_index'));
                }

                if (!in_array($canonicalMethod, array('GET'))) {
                    $allow = array_merge($allow, array('GET'));
                    goto not_site_index;
                }

                return $ret;
            }
            not_site_index:

            // site_show
            if (preg_match('#^/site/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'site_show')), array (  '_controller' => 'AppBundle\\Controller\\SiteController::showAction',));
                if (!in_array($canonicalMethod, array('GET'))) {
                    $allow = array_merge($allow, array('GET'));
                    goto not_site_show;
                }

                return $ret;
            }
            not_site_show:

        }

        if ('/' === $pathinfo && !$allow) {
            throw new Symfony\Component\Routing\Exception\NoConfigurationException();
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
