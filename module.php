<?php

/**
 * 微商城模块定义
 *
 * @author WeEngine Team
 * @url
 */
defined('IN_IA') or exit('Access Denied');

class Css9_examModule extends WeModule {

    public function settingsDisplay($settings) {
        global $_GPC, $_W;
        $rank_type = 0;
        if(isset($_GPC['rank_type'])){
            foreach ($_GPC['rank_type'] as $key => $value) {
                $rank_type += $value;
            }
        }
        if (checksubmit()) {
            $cfg = array(
                'integral' => isset($_GPC['integral'])?$_GPC['integral']:5,
                'is_fans' => isset($_GPC['is_fans'])?1:0,
	            'is_remind' => isset($_GPC['is_remind'])?1:0,
	            'rank_type' => $rank_type,
                'rank_amount' => $_GPC['rank_amount'],
                'is_award' => isset($_GPC['is_award'])?1:0,
            );
            if(isset($_GPC['is_award'])){
                $cfg['award_rule'] = $_GPC['award_rule'];
            }
            if ($this->saveSettings($cfg)) {
                message('保存成功', 'refresh');
            }
        }
        load()->func('tpl');
		include $this->template('setting');
    }

}
