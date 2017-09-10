<?php
declare(strict_types=1);

namespace AppBundle\Controller\Prettify;

use AppBundle\Entity\CarbonLog;
use Carbon\Carbon;
use DateTime;
use Faker\Factory;
use InvalidArgumentException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Xgc\CarbonBundle\Form\Type\CarbonType;

/**
 * Class PrettifyController
 *
 * @package AppBundle\Controller\Prettify
 *
 * @Route("/prettify")
 */
class PrettifyController extends Controller
{

    /**
     * @Route("/")
     * @Method({"GET", "POST"})
     * @Template()
     *
     * @param Request $request
     *
     * @return array|RedirectResponse
     */
    public function indexAction(Request $request)
    {
        return [];
    }
}
