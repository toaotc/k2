<?php

namespace Kimai\Bundle\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * DefaultController
 *
 * @author Enrico Thies <enrico.thies@gmail.com>
 *
 * @Route("/core")
 */
class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     *
     * @return array
     */
    public function indexAction()
    {
        return array();
    }
}
