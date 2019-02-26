<?php
/**
 * 微商城模块微站定义
 *
 * @author WeEngine Team
 * @url
 */
defined('IN_IA') or exit('Access Denied');

session_start();

class Css9_examModuleSite extends WeModuleSite {

	public $settings;

	public function __construct() {
		global $_W;
		$sql = 'SELECT `settings` FROM ' . tablename('uni_account_modules') . ' WHERE `uniacid` = :uniacid AND `module` = :module';
		$settings = pdo_fetchcolumn($sql, array(':uniacid' => $_W['uniacid'], ':module' => 'cjd_css9_v1'));
		$this->settings = iunserializer($settings);
	}

	public function doWebRule(){
		global $_W, $_GPC;
		$rid = intval($_GPC['id']);
		echo $rid;
	}

}
