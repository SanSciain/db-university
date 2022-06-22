<?php
class Departments
{
    public $id;
    public $name;
    public $address;
    public $phone;
    public $email;
    public $website;
    public $head_of_department;

    public function __construct($_id, $_name)
    {
        $this->id = $_id;
        $this->name = $_name;
    }

    public function setContacts($_address, $_phone, $_email, $_website)
    {
        $this->address = $_address;
        $this->phone = $_phone;
        $this->email = $_email;
        $this->website = $_website;
    }
}
