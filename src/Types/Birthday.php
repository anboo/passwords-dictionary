<?php
/**
 * Created by PhpStorm.
 * User: anboo
 * Date: 27.01.17
 * Time: 16:34
 */

namespace Anboo\Types;


class Birthday extends AbstractType
{
    /**
     * @var array
     */
    private $dates;

    public function __construct(array $dates)
    {
        $this->dates = $dates;
    }

    private function parseDate($date)
    {
        return explode('.', $date);
    }

    public function generateVariants(array $data)
    {
        foreach($this->dates as $date) {
            $info = $this->parseDate($date);
            foreach($data as $password) {
                $variantWithEndYear = $password.$info[2];
                $this->addVariant($variantWithEndYear);
                $variantWithStartYear = $info[2].$password;
                $this->addVariant($variantWithStartYear);

                foreach($info as $partDate) {
                    $this->addPart($partDate);
                }
            }
        }
    }
}