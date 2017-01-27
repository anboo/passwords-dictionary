<?php
/**
 * Created by PhpStorm.
 * User: anboo
 * Date: 27.01.17
 * Time: 16:34
 */

namespace Anboo\Types;


class PhoneNumber extends AbstractType
{
    private $phoneNumbers = [];

    public function __construct(array $phoneNumbers = [])
    {
        $this->phoneNumbers = $phoneNumbers;
    }

    private function parsePhoneNumber($phoneNumber) {
        if(!preg_match( '/^\+\d(\d{3})(\d{3})(\d{4})$/', $phoneNumber,  $matches)) {
            throw new \Exception(sprintf('Phone number %s incorrect', $phoneNumber));
        }

        return $matches;
    }

    public function generateVariants(array $data)
    {
        foreach($this->phoneNumbers as $phoneNumber) {
            $info = $this->parsePhoneNumber($phoneNumber);

            foreach($data as $password) {
                $passwordWithEndPhoneInEnd = $password . $info[3];
                $this->addVariant($passwordWithEndPhoneInEnd);
                $passwordWithEndPhoneInStart = $info[3] . $password;
                $this->addVariant($passwordWithEndPhoneInStart);
                foreach($info as $partOfPhone) {
                    $this->addPart($partOfPhone);
                }
            }
        }
    }
}