<?php

use yii\db\Schema;
use echoooxx\admin\components\Configs;

/**
 * Migration table of table_menu
 *
 * @author Misbahul D Munir <misbahuldmunir@gmail.com>
 * @since 1.0
 */
class m160712_111327_create_menu_table extends \yii\db\Migration
{

    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $menuTable = Configs::instance()->menuTable;
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable($menuTable, [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . '(128) NOT NULL',
            'parent' => Schema::TYPE_INTEGER. ' NULL',
            'route' => Schema::TYPE_STRING . '(256)',
            'order' => Schema::TYPE_INTEGER,
            'data' => Schema::TYPE_TEXT,
            "FOREIGN KEY (parent) REFERENCES {$menuTable}(id) ON DELETE SET NULL ON UPDATE CASCADE",
        ], $tableOptions);

        $this->batchInsert($menuTable, [
            'id', 'name', 'parent', 'route', 'order', 'data',
        ], [
            [
                1,'系统管理',NULL,NULL,NULL,NULL,
            ],
            [
                2,'用户管理',1,'/admin/assignment/index',0,NULL,
            ],
            [
                3,'菜单管理',1,'/admin/menu/index',1,NULL,
            ],
            [
                4,'权限管理',1,'/admin/permission/index',NULL,NULL,
            ],
            [
                5,'角色管理',1,'/admin/role/index',NULL,NULL,
            ],
            [
                6,'路由管理',1,'/admin/route/index',NULL,NULL,
            ],
            [
                7,'规则管理',1,'/admin/rule/index',NULL,NULL
            ],
            [
                8,'操作日志',1,'/admin/log/index',100,NULL
            ],
            [
                9,'网站菜单管理',NULL,'/menu/list',NULL,NULL
            ],
            [
                10,'网站素材管理',NULL,'/resource/list',NULL,NULL
            ],
            [
                11,'网站设置',NULL,NULL,NULL,NULL
            ],
            [
                12,'基础配置',11,'/config/siteconfig',NULL,NULL
            ],
            [
                13,'联系配置',11,'/config/contactconfig',NULL,NULL
            ],
            [
                14,'网站内容',NULL,NULL,NULL,NULL
            ],
            [
                15,'独立页面',14,'/article/single',NULL,NULL
            ],
            [
                16,'目录下文章',14,'/article/pages',NULL,NULL
            ]
        ]);

        $sql = "INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES ('/admin/*', '2', null, null, null, '1457330826', '1457330826'), ('/admin/assignment/*', '2', null, null, null, '1457330826', '1457330826'), ('/admin/assignment/assign', '2', null, null, null, '1457330826', '1457330826'), ('/admin/assignment/create', '2', null, null, null, '1457521995', '1457521995'), ('/admin/assignment/delete', '2', null, null, null, '1458010804', '1458010804'), ('/admin/assignment/index', '2', null, null, null, '1457330826', '1457330826'), ('/admin/assignment/search', '2', null, null, null, '1457330826', '1457330826'), ('/admin/assignment/update', '2', null, null, null, '1458010804', '1458010804'), ('/admin/assignment/view', '2', null, null, null, '1457330826', '1457330826'), ('/admin/default/*', '2', null, null, null, '1457330826', '1457330826'), ('/admin/default/index', '2', null, null, null, '1457330826', '1457330826'), ('/admin/log/*', '2', null, null, null, '1468288689', '1468288689'), ('/admin/log/index', '2', null, null, null, '1468288689', '1468288689'), ('/admin/log/view', '2', null, null, null, '1468288689', '1468288689'), ('/admin/menu/*', '2', null, null, null, '1457330826', '1457330826'), ('/admin/menu/create', '2', null, null, null, '1457330826', '1457330826'), ('/admin/menu/delete', '2', null, null, null, '1457330826', '1457330826'), ('/admin/menu/index', '2', null, null, null, '1457330826', '1457330826'), ('/admin/menu/update', '2', null, null, null, '1457330826', '1457330826'), ('/admin/menu/view', '2', null, null, null, '1457330826', '1457330826'), ('/admin/permission/*', '2', null, null, null, '1457948575', '1457948575'), ('/admin/permission/assign', '2', null, null, null, '1457330826', '1457330826'), ('/admin/permission/create', '2', null, null, null, '1457330826', '1457330826'), ('/admin/permission/delete', '2', null, null, null, '1457330826', '1457330826'), ('/admin/permission/index', '2', null, null, null, '1457330826', '1457330826'), ('/admin/permission/search', '2', null, null, null, '1457330826', '1457330826'), ('/admin/permission/update', '2', null, null, null, '1457330826', '1457330826'), ('/admin/permission/view', '2', null, null, null, '1457330826', '1457330826'), ('/admin/role/*', '2', null, null, null, '1457330826', '1457330826'), ('/admin/role/assign', '2', null, null, null, '1457330826', '1457330826'), ('/admin/role/create', '2', null, null, null, '1457330826', '1457330826'), ('/admin/role/delete', '2', null, null, null, '1457330826', '1457330826'), ('/admin/role/index', '2', null, null, null, '1457330826', '1457330826'), ('/admin/role/search', '2', null, null, null, '1457330826', '1457330826'), ('/admin/role/update', '2', null, null, null, '1457330826', '1457330826'), ('/admin/role/view', '2', null, null, null, '1457330826', '1457330826'), ('/admin/route/*', '2', null, null, null, '1457330826', '1457330826'), ('/admin/route/assign', '2', null, null, null, '1457330826', '1457330826'), ('/admin/route/create', '2', null, null, null, '1457330826', '1457330826'), ('/admin/route/index', '2', null, null, null, '1457330826', '1457330826'), ('/admin/route/refresh', '2', null, null, null, '1457947924', '1457947924'), ('/admin/route/search', '2', null, null, null, '1457330826', '1457330826'), ('/admin/rule/*', '2', null, null, null, '1457330826', '1457330826'), ('/admin/rule/create', '2', null, null, null, '1457330826', '1457330826'), ('/admin/rule/delete', '2', null, null, null, '1457330826', '1457330826'), ('/admin/rule/index', '2', null, null, null, '1457330826', '1457330826'), ('/admin/rule/update', '2', null, null, null, '1457330826', '1457330826'), ('/admin/rule/view', '2', null, null, null, '1457330826', '1457330826'), ('/article/*', '2', null, null, null, '1527489664', '1527489664'), ('/article/edit', '2', null, null, null, '1527577690', '1527577690'), ('/article/pages', '2', null, null, null, '1527489664', '1527489664'), ('/article/single', '2', null, null, null, '1527489664', '1527489664'), ('/article/status', '2', null, null, null, '1528422254', '1528422254'), ('/config/*', '2', null, null, null, '1526889936', '1526889936'), ('/config/contactconfig', '2', null, null, null, '1527316318', '1527316318'), ('/config/edit', '2', null, null, null, '1526889936', '1526889936'), ('/config/siteconfig', '2', null, null, null, '1526889936', '1526889936'), ('/debug/*', '2', null, null, null, '1457330826', '1457330826'), ('/debug/default/*', '2', null, null, null, '1457330826', '1457330826'), ('/debug/default/db-explain', '2', null, null, null, '1457330826', '1457330826'), ('/debug/default/download-mail', '2', null, null, null, '1457330826', '1457330826'), ('/debug/default/index', '2', null, null, null, '1457330826', '1457330826'), ('/debug/default/toolbar', '2', null, null, null, '1457330826', '1457330826'), ('/debug/default/view', '2', null, null, null, '1457330826', '1457330826'), ('/gii/*', '2', null, null, null, '1457330826', '1457330826'), ('/gii/default/*', '2', null, null, null, '1457330826', '1457330826'), ('/gii/default/action', '2', null, null, null, '1457330826', '1457330826'), ('/gii/default/diff', '2', null, null, null, '1457330826', '1457330826'), ('/gii/default/index', '2', null, null, null, '1457330826', '1457330826'), ('/gii/default/preview', '2', null, null, null, '1457330826', '1457330826'), ('/gii/default/view', '2', null, null, null, '1457330826', '1457330826'), ('/menu/*', '2', null, null, null, '1527220446', '1527220446'), ('/menu/delete', '2', null, null, null, '1527220446', '1527220446'), ('/menu/edit', '2', null, null, null, '1527220446', '1527220446'), ('/menu/list', '2', null, null, null, '1527220446', '1527220446'), ('/resource/*', '2', null, null, null, '1527131636', '1527131636'), ('/resource/delete', '2', null, null, null, '1527131636', '1527131636'), ('/resource/edit', '2', null, null, null, '1527131636', '1527131636'), ('/resource/imgs', '2', null, null, null, '1527577690', '1527577690'), ('/resource/list', '2', null, null, null, '1527131636', '1527131636'), ('/site/*', '2', null, null, null, '1457330826', '1457330826'), ('/site/error', '2', null, null, null, '1457330826', '1457330826'), ('/site/index', '2', null, null, null, '1457330826', '1457330826'), ('/site/login', '2', null, null, null, '1457330826', '1457330826'), ('/site/logout', '2', null, null, null, '1457330826', '1457330826'), ('/site/upload4kv', '2', null, null, null, '1527577697', '1527577697'), ('/template/*', '2', null, null, null, '1528422254', '1528422254'), ('/template/delete', '2', null, null, null, '1528422254', '1528422254'), ('/template/edit', '2', null, null, null, '1528422254', '1528422254'), ('/template/list', '2', null, null, null, '1528422254', '1528422254'), ('Admin', '1', 'Administrators', null, null, '1457084487', '1457947508'), ('上传文件管理', '2', null, null, null, '1527131665', '1527131665'), ('修改用户', '2', null, null, null, '1457522051', '1457522051'), ('修改菜单', '2', null, null, null, '1457330464', '1457405433'), ('内容管理', '2', null, null, null, '1527489680', '1527489680'), ('删除权限', '2', null, null, null, '1457331320', '1457331320'), ('删除菜单', '2', null, null, null, '1457330485', '1457330485'), ('删除规则', '2', null, null, null, '1457331677', '1457331677'), ('删除角色', '2', null, null, null, '1457331161', '1457331161'), ('删除路由', '2', null, null, null, '1457331499', '1457331499'), ('操作日志', '2', null, null, null, '1468288713', '1468288713'), ('新增权限', '2', null, null, null, '1457331279', '1457331279'), ('新增用户', '2', null, null, null, '1457433802', '1457433802'), ('新增菜单', '2', null, null, null, '1457330445', '1457330445'), ('新增规则', '2', null, null, null, '1457331552', '1457331610'), ('新增角色', '2', null, null, null, '1457331075', '1457331075'), ('新增路由', '2', null, null, null, '1457331386', '1457331386'), ('更新权限', '2', null, null, null, '1457331303', '1457331303'), ('更新规则', '2', null, null, null, '1457331647', '1457331647'), ('更新角色', '2', null, null, null, '1457331126', '1457331126'), ('更新路由', '2', null, null, null, '1457331492', '1457331492'), ('权限分配', '2', null, null, null, '1457418746', '1457418746'), ('权限管理', '2', null, null, null, '1457331258', '1457331258'), ('查看操作日志', '2', null, null, null, '1468294314', '1468294314'), ('查看权限', '2', null, null, null, '1457331342', '1457331342'), ('查看用户权限', '2', null, null, null, '1457331965', '1457331965'), ('查看菜单', '2', null, null, null, '1457330619', '1457330619'), ('查看规则', '2', null, null, null, '1457331692', '1457331692'), ('查看角色', '2', null, null, null, '1457331191', '1457331191'), ('样式管理', '2', null, null, null, '1528422272', '1528422272'), ('用户权限分配', '2', null, null, null, '1457333258', '1457333258'), ('用户管理', '2', null, null, null, '1457079781', '1457331877'), ('网站菜单管理', '2', null, null, null, '1527220480', '1527220480'), ('菜单管理', '2', null, null, null, '1457324314', '1457324314'), ('规则管理', '2', null, null, null, '1457331529', '1457331529'), ('角色权限分配', '2', null, null, null, '1457333688', '1457333688'), ('角色管理', '2', null, null, null, '1457330790', '1457330790'), ('设置管理', '2', null, null, null, '1526889889', '1526889889'), ('路由分配', '2', null, null, null, '1457333742', '1457333742'), ('路由管理', '2', null, null, null, '1457331368', '1457331368')";
        $this->execute($sql);

        $sql = "INSERT INTO `auth_assignment` VALUES ('Admin','1',1457092343);";
        $this->execute($sql);

        $sql = "INSERT INTO `auth_item_child` (`parent`, `child`) VALUES ('用户权限分配', '/admin/assignment/assign'), ('新增用户', '/admin/assignment/create'), ('用户管理', '/admin/assignment/index'), ('查看用户权限', '/admin/assignment/search'), ('修改用户', '/admin/assignment/update'), ('查看用户权限', '/admin/assignment/view'), ('操作日志', '/admin/log/index'), ('查看操作日志', '/admin/log/view'), ('新增菜单', '/admin/menu/create'), ('删除菜单', '/admin/menu/delete'), ('菜单管理', '/admin/menu/index'), ('修改菜单', '/admin/menu/update'), ('查看菜单', '/admin/menu/view'), ('权限分配', '/admin/permission/assign'), ('新增权限', '/admin/permission/create'), ('删除权限', '/admin/permission/delete'), ('权限管理', '/admin/permission/index'), ('查看权限', '/admin/permission/search'), ('更新权限', '/admin/permission/update'), ('查看权限', '/admin/permission/view'), ('角色权限分配', '/admin/role/assign'), ('新增角色', '/admin/role/create'), ('删除角色', '/admin/role/delete'), ('角色管理', '/admin/role/index'), ('查看角色', '/admin/role/search'), ('更新角色', '/admin/role/update'), ('查看角色', '/admin/role/view'), ('路由分配', '/admin/route/assign'), ('新增路由', '/admin/route/create'), ('查看规则', '/admin/route/index'), ('查看规则', '/admin/route/search'), ('新增规则', '/admin/rule/create'), ('删除规则', '/admin/rule/delete'), ('规则管理', '/admin/rule/index'), ('路由管理', '/admin/rule/index'), ('更新规则', '/admin/rule/update'), ('内容管理', '/article/*'), ('设置管理', '/config/*'), ('网站菜单管理', '/menu/*'), ('网站菜单管理', '/menu/delete'), ('网站菜单管理', '/menu/edit'), ('网站菜单管理', '/menu/list'), ('上传文件管理', '/resource/*'), ('样式管理', '/template/*'), ('Admin', '上传文件管理'), ('Admin', '修改用户'), ('Admin', '修改菜单'), ('Admin', '内容管理'), ('Admin', '删除权限'), ('Admin', '删除菜单'), ('Admin', '删除规则'), ('Admin', '删除角色'), ('Admin', '删除路由'), ('Admin', '操作日志'), ('Admin', '新增权限'), ('Admin', '新增用户'), ('Admin', '新增菜单'), ('Admin', '新增规则'), ('Admin', '新增角色'), ('Admin', '新增路由'), ('Admin', '更新权限'), ('Admin', '更新规则'), ('Admin', '更新角色'), ('Admin', '更新路由'), ('Admin', '权限分配'), ('Admin', '权限管理'), ('Admin', '查看操作日志'), ('Admin', '查看权限'), ('Admin', '查看用户权限'), ('Admin', '查看菜单'), ('Admin', '查看规则'), ('Admin', '查看角色'), ('Admin', '样式管理'), ('Admin', '用户权限分配'), ('Admin', '用户管理'), ('Admin', '网站菜单管理'), ('Admin', '菜单管理'), ('Admin', '规则管理'), ('Admin', '角色权限分配'), ('Admin', '角色管理'), ('Admin', '设置管理'), ('Admin', '路由分配'), ('Admin', '路由管理')";
        $this->execute($sql);

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable(Configs::instance()->menuTable);
    }
}


