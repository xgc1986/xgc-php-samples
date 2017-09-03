<?php
declare(strict_types=1);

namespace AppBundle\Controller\Carbon;

use AppBundle\Entity\CarbonLog;
use Carbon\Carbon;
use InvalidArgumentException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Xgc\CarbonBundle\Form\Type\CarbonType;

/**
 * Class CarbonController
 *
 * @package AppBundle\Controller\Carbon
 *
 * @Route("/carbon")
 */
class CarbonController extends Controller
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
        $carbonModel = new CarbonLog();

        $form = $this->createFormBuilder($carbonModel, ['method' => 'POST'])
                     ->add('date', CarbonType::class)
                     ->add('send', SubmitType::class)
                     ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $carbonModel = $form->getData();

            return $this->redirectToRoute('app_carbon_carbon_carbon', ['date' => $carbonModel->getDate()]);
        }

        return [
            'form' => $form->createView(),
        ];
    }

    /**
     * @Route("/{date}")
     * @Method("GET")
     * @Template()
     *
     * @param Carbon $date
     *
     * @return array
     * @throws InvalidArgumentException
     */
    public function carbonAction(Carbon $date): array
    {
        $doctrine = $this->get('doctrine');
        $carbons  = $doctrine->getRepository(CarbonLog::class)->findAll();
        if (count($carbons) === 10) {
            $doctrine->getManager()->remove($carbons[0]);
        }

        $carbonLog = new CarbonLog();
        $carbonLog->setDate($date);

        $doctrine->getManager()->persist($carbonLog);
        $doctrine->getManager()->flush();

        return [
            'date' => $date,
            'log'  => $carbons
        ];
    }
}
