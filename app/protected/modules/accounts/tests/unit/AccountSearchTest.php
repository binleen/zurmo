<?php
    /*********************************************************************************
     * Zurmo is a customer relationship management program developed by
     * Zurmo, Inc. Copyright (C) 2014 Zurmo Inc.
     *
     * Zurmo is free software; you can redistribute it and/or modify it under
     * the terms of the GNU Affero General Public License version 3 as published by the
     * Free Software Foundation with the addition of the following permission added
     * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
     * IN WHICH THE COPYRIGHT IS OWNED BY ZURMO, ZURMO DISCLAIMS THE WARRANTY
     * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
     *
     * Zurmo is distributed in the hope that it will be useful, but WITHOUT
     * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
     * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
     * details.
     *
     * You should have received a copy of the GNU Affero General Public License along with
     * this program; if not, see http://www.gnu.org/licenses or write to the Free
     * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
     * 02110-1301 USA.
     *
     * You can contact Zurmo, Inc. with a mailing address at 27 North Wacker Drive
     * Suite 370 Chicago, IL 60606. or at email address contact@zurmo.com.
     *
     * The interactive user interfaces in original and modified versions
     * of this program must display Appropriate Legal Notices, as required under
     * Section 5 of the GNU Affero General Public License version 3.
     *
     * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
     * these Appropriate Legal Notices must retain the display of the Zurmo
     * logo and Zurmo copyright notice. If the display of the logo is not reasonably
     * feasible for technical reasons, the Appropriate Legal Notices must display the words
     * "Copyright Zurmo Inc. 2014. All rights reserved".
     ********************************************************************************/

    class AccountSearchTest extends ZurmoBaseTest
    {
        public static function setUpBeforeClass()
        {
            parent::setUpBeforeClass();
            $user = SecurityTestHelper::createSuperAdmin();
            Yii::app()->user->userModel = $user;
            $accountData = array(
                'Samsonite' => '123-456-789',
                'Zurmo'     => '123-456-789',
                'Auto'      => '123-456-789',
                'Build'     => '123-456-789',
                'Roger'     => '123-123-123',
            );

            foreach ($accountData as $name => $phone)
            {
                $account               = new Account();
                $account->name         = $name;
                $account->owner        = $user;
                $account->primaryEmail = new Email();
                $account->primaryEmail->emailAddress = strtolower($name) . '@zurmoland.com';
                $account->secondaryEmail = new Email();
                $account->secondaryEmail->emailAddress = 'a' . strtolower($name) . '@zurmoworld.com';
                $account->officePhone = $phone;
                assert($account->save()); // Not Coding Standard
            }
        }

        public function testGetAccountsByAnyEmailAddress()
        {
            $data = AccountSearch::getAccountsByAnyEmailAddress('test@example.com', 5);
            $this->assertEquals(0, count($data));

            //search by primaryEmail
            $data = AccountSearch::getAccountsByAnyEmailAddress('zurmo@zurmoland.com', 5);
            $this->assertEquals(1, count($data));
            $this->assertEquals('Zurmo', $data[0]->name);

            //search by secondaryEmail
            $data = AccountSearch::getAccountsByAnyEmailAddress('aroger@zurmoworld.com', 5);
            $this->assertEquals(1, count($data));
            $this->assertEquals('Roger', $data[0]->name);
        }

        public function testGetAccountsByAnyPhone()
        {
            Yii::app()->user->userModel = User::getByUsername('super');
            $data = AccountSearch::getAccountsByAnyPhone('123-456-789');
            $this->assertEquals(4, count($data));

            $data = AccountSearch::getAccountsByAnyPhone('123-123-123');
            $this->assertEquals(1, count($data));
            $this->assertEquals('Roger', $data[0]->name);
        }

        public function testGetAccountsByPartialName()
        {
            Yii::app()->user->userModel = User::getByUsername('super');
            $data = AccountSearch::getAccountsByPartialName('zurmo');
            $this->assertEquals(1, count($data));
            $this->assertEquals('Zurmo', $data[0]->name);

            $data = AccountSearch::getAccountsByPartialName('sonite');
            $this->assertEquals(1, count($data));
            $this->assertEquals('Samsonite', $data[0]->name);

            $data = AccountSearch::getAccountsByPartialName('u');
            $this->assertEquals(3, count($data));
        }
    }
?>
