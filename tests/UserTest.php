<?php

include_once 'src/User.php';

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    private User $user;

    protected function setUp(): void
    {
        $this->user = new User('test@test.fr', 'toto', 'tata', 'testMotDePasse', Carbon::now()->subDecades(2));
        parent::setUp();
    }

    public function testIsValidNominal()
    {
        $this->assertTrue($this->user->isValid());
    }

    public function testIsNotValidDueToEmptyFirstname()
    {
        $this->user->setFname('');
        $this->assertFalse($this->user->isValid());
    }

    public function testIsNotValidDueToEmptyLastname()
    {
        $this->user->setLname('');
        $this->assertFalse($this->user->isValid());
    }

    public function testIsNotValidDueToEmptyEmail()
    {
        $this->user->setEmail('');
        $this->assertFalse($this->user->isValid());
    }

    public function testIsNotValidDueToBadEmail()
    {
        $this->user->setEmail('pasbon');
        $this->assertFalse($this->user->isValid());
    }

    public function testIsNotValidDueToBirthdayToYoung()
    {
        $this->user->setBirthday(Carbon::now()->subYears(10));
        $this->assertFalse($this->user->isValid());
    }

    public function testIsNotValidDueToBirthdayInFuture()
    {
        $this->user->setBirthday(Carbon::now()->addDecade());
        $this->assertFalse($this->user->isValid());
    }

    public function testIsNotValidDueToShortPassword()
    {
        $this->user->setPassword('aze');
        $this->assertFalse($this->user->isValid());
    }

    public function testIsNotValidDueToLongPassword()
    {
        $this->user->setPassword('azereezfdsfszfzczczzfzzzczczfzczzdzdzvzdczfvdcwdffqdcdfvgqedzdsfvdseqzdfsv');
        $this->assertFalse($this->user->isValid());
    }

}