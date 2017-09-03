<?php
declare(strict_types=1);

namespace AppBundle\Entity;

use Carbon\Carbon;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class CarbonLog
 *
 * @package AppBundle\Entity
 *
 * @ORM\Entity()
 */
class CarbonLog
{

    /**
     * @var int
     *
     * @ORM\Id()
     * @ORM\GeneratedValue("AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var null|Carbon
     *
     * @ORM\Column(type="carbon")
     */
    protected $date;

    /**
     * @return null|Carbon
     */
    public function getDate(): ?Carbon
    {
        return $this->date;
    }

    /**
     * @param Carbon $date
     */
    public function setDate(Carbon $date): void
    {
        $this->date = $date;
    }
}
