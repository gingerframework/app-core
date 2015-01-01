<?php
/*
 * This file is part of the Ginger Workflow Framework.
 * (c) Alexander Miertsch <contact@prooph.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 * Date: 06.12.14 - 22:32
 */

namespace SystemConfig\Controller;

use Dashboard\Controller\AbstractWidgetController;
use Dashboard\View\DashboardWidget;
use SystemConfig\Projection\GingerConfig;
use SystemConfig\Service\NeedsSystemConfig;

/**
 * Class DashboardWidgetController
 *
 * @package SystemConfig\src\Controller
 * @author Alexander Miertsch <kontakt@codeliner.ws>
 */
class DashboardWidgetController extends AbstractWidgetController implements NeedsSystemConfig
{
    /**
     * @var GingerConfig
     */
    private $systemConfig;

    /**
     * @return DashboardWidget
     */
    public function widgetAction()
    {
        $params = [];
        try {
            $params['gingerConfig'] = $this->systemConfig;
            $params['error'] = false;
        } catch (\Exception $ex) {
            $params['gingerConfig'] = null;
            $params['error'] = $ex->getMessage();
        }

        $params['config_dir_is_writable'] = is_writable($this->systemConfig->getConfigLocation()->toString());
        $params['config_is_writable'] = is_writable($this->systemConfig->getConfigLocation()->toString() . DIRECTORY_SEPARATOR . \SystemConfig\Model\GingerConfig::configFileName());
        $params['config_dir'] = $this->systemConfig->getConfigLocation()->toString();
        $params['config_file_name'] = \SystemConfig\Model\GingerConfig::configFileName();

        return DashboardWidget::initialize('system-config/dashboard/widget', 'System Configuration', 4, $params);
    }

    /**
     * @param GingerConfig $systemConfig
     * @return void
     */
    public function setSystemConfig(GingerConfig $systemConfig)
    {
        $this->systemConfig = $systemConfig;
    }
}
 