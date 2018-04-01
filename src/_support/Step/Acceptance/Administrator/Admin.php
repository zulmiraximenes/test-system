<?php
/**
 * @package     Joomla.Test
 * @subpackage  AcceptanceTester.Step
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Step\Acceptance\Administrator;

use Codeception\Scenario;
use Page\Acceptance\Administrator\AdminPage;
use Page\Acceptance\Administrator\ArticleManagerPage;
use Page\Acceptance\Administrator\UserManagerPage;
use Page\Acceptance\Administrator\CategoryManagerPage;

/**
 * Acceptance Step object class for admin steps.
 *
 * @package  Step\Acceptance\Administrator
 *
 * @since    __DEPLOY_VERSION__
 */
class Admin extends \AcceptanceTester
{
	/**
	 * Admin Page Object for this class
	 *
	 * @var     null|ArticleManagerPage
	 *
	 * @since   __DEPLOY_VERSION__
	 */
	protected $adminPage = null;

	/**
	 * Article Manager Page Object for this class
	 *
	 * @var     null|ArticleManagerPage
	 *
	 * @since   __DEPLOY_VERSION__
	 */
	protected $articleManagerPage = null;

	/**
	 * Category Manager Page Object for this class
	 *
	 * @var     null|CategoryManagerPage
	 *
	 * @since   __DEPLOY_VERSION__
	 */
	protected $categoryManagerPage = null;

	/**
	 * User Manager Page Object for this class
	 *
	 * @var     null|UserManagerPage
	 *
	 * @since   __DEPLOY_VERSION__
	 */
	protected $userManagerPage = null;

	/**
	 * User Group Page Object for this class
	 *
	 * @var     null|UserManagerPage
	 *
	 * @since   __DEPLOY_VERSION__
	 */
	protected $userGroupPage = null;

	/**
	 * User ACL Page Object for this class
	 *
	 * @var     null|UserManagerPage
	 *
	 * @since   __DEPLOY_VERSION__
	 */
	protected $userAclPage = null;

	/**
	 * Menu Manager Page Object for this class
	 *
	 * @var     null|MenuManagerPage
	 *
	 * @since   __DEPLOY_VERSION__
	 */
	protected $menuManagerPage = null;

	/**
	 * User constructor.
	 *
	 * @param   Scenario  $scenario  Scenario object
	 *
	 * @since   __DEPLOY_VERSION__
	 */
	public function __construct(Scenario $scenario)
	{
		parent::__construct($scenario);

		// Initialize Page Objects
		$this->adminPage           = new AdminPage($scenario);
		$this->articleManagerPage  = new ArticleManagerPage($scenario);
		$this->userManagerPage     = new UserManagerPage($scenario);
		$this->categoryManagerPage = new CategoryManagerPage($scenario);
	}

	/**
	 * Method to confirm system message appear
	 *
	 * @param   string  $text     The text of message
	 * @param   int     $timeout  Number of seconds to wait
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function seeSystemMessage($text, $timeout = TIMEOUT)
	{
		$I = $this;
		$I->waitForText($text, $timeout, AdminPage::$systemMessageContainer);
		$I->see($text, AdminPage::$systemMessageContainer);
	}
}