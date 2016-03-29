<?php
/**
 * Created by PhpStorm.
 * User: yongf-new
 * Date: 2016/3/16
 * Time: 22:01
 */

namespace Home\Model;

use Think\Model;

class UserModel extends Model
{
    /**
     * table方法也属于模型类的连贯操作方法之一，主要用于指定操作的数据表。
     */
    protected function tableAction()
    {
        $Model = M();

        //一般情况下，无需调用table方法，默认会自动获取当前模型对应或者定义的数据表。

        //自动获取当前模型对应的数据表前缀来生成 think_user 数据表名称。这种方法较好
        $Model->table('__USER__')->where('status>1')->select();

        //上一个查询可以简化为：
        $Model->where('status>1')->select();

        $Model->field('user.name,role.title')->table(array('think_user' => 'user', 'think_role' => 'role'))->limit(10)->select();
    }

    /**
     * alias用于设置当前数据表的别名，便于使用其他的连贯操作例如join方法等。
     */
    protected function aliasAction()
    {
        $Model = M('User');
        $Model->alias('a')->join('__DEPT__ b ON b.user_id= a.id')->select();

        //SQL
        //SELECT * FROM think_user a INNER JOIN think_dept b ON b.user_id= a.id
    }

}