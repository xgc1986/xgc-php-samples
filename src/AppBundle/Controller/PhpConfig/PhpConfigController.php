<?php
declare(strict_types=1);

namespace AppBundle\Controller\PhpConfig;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Xgc\PhpConfig\Config;

/**
 * Class PhpConfigController
 *
 * @package AppBundle\Controller\PhpConfig
 *
 * @Route("/php-config")
 */
class PhpConfigController extends Controller
{

    /**
     * @return array
     * @throws \Xgc\PhpConfig\Exception\InvalidPhpConfigException
     *
     * @Route("/")
     * @Template()
     */
    public function indexAction(): array
    {
        return [
            'postMaxSize' => Config::postMaxSize(),
            'postMaxSizeAlt' => Config::load(Config::POST_MAX_SIZE)
        ];
    }
}
