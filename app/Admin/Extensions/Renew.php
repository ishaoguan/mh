<?php

namespace App\Admin\Extensions;

use App\Models\User;
use Encore\Admin\Admin;

class Renew
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    protected function script()
    {
        $user = User::find($this->id);


        $content = "将要将ID【".$this->id."】  名称为【".$user->name."】的用户从黑名单移入到正常用户列表，是否确认";

        return <<<EOT

  
$('.grid-check-row-$this->id').on('click', function () {

  var user_id = $this->id

 $("#user_id").val(user_id);
 
document.getElementById("content").innerHTML="{$content}";

  $("#delcfmOverhaul").modal({
        backdrop : 'static',
        keyboard : false
    });

});



EOT;
    }

    protected function render()
    {
        Admin::script($this->script());


        return "<a class='btn btn-sm btn-default grid-check-row-$this->id'   style='width:80px;margin-left:-25px' data-id='{$this->id}'>恢复</a>
<form action=\"/admin/renew\" method=\"post\">
<input type=\"hidden\"  name=\"_token\" value=".csrf_token().">
<input type=\"hidden\" id=\"user_id\"  name=\"user_id\">
            <div class=\"modal fade\" id=\"delcfmOverhaul\">
                                <div class=\"modal-dialog\" >
                                    <div class=\"modal-content message_align\">
                                        <div class=\"modal-header\" style=\"background-color: #55ACEE\">
                                            <button type=\"button\" class=\"close\" data-dismiss=\"modal\"
                                                aria-label=\"Close\">
                                                <span aria-hidden=\"true\">×</span>
                                            </button>
                                            <h4 class=\"modal-title\">提示</h4>
                                        </div>
                                        <div class=\"modal-body\">
                                            <!-- 隐藏需要删除的id -->
                                            <input type=\"hidden\" id=\"deleteHaulId\" />
                                            <p id='content'></p>
                                        </div>
                                        <div class=\"modal-footer\">
                                            <button type=\"button\" class=\"btn btn-default\"
                                                data-dismiss=\"modal\">取消</button>
                                            <button type=\"submit\" class=\"btn btn-primary\"
                                                id=\"renew\">确认</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                </div>
                                </form>

";

    }

    public function __toString()
    {
        return $this->render();
    }
}