<?php
defined('BASEPATH') or die('no direct script access allowed');
?>
<h3 class="left">Chat supporter</h3>
<div ng-app="lynx" ng-controller="portalAdminSupportCtrl" class="admin-support-ctrl">
    <div ng-repeat="customer in customers track by $index" class="chat-box " id="chat-{{customer.from}}">
        <h3 class="left" style="font-size: 12px;">
            {{customer.user.account}}&nbsp;
            <div style="float:right" ng-if="customer.status == 'unavailable'" ng-click="removeChat(customer.from)">
                <a href="javascript:;">Close</a>
            </div>
        </h3>
        <ul class="chat-message-container left">
            <li>{{customer.other.formData['additional-information']}}</li>
            <li ng-repeat="message in customer.messages track by $index">
                <label ng-class="{'chat-message-other': message.userName, 'chat-message-me': !message.userName}">{{message.userName|| 'You'}}:</label> {{message.body}}
            </li>
        </ul>
        <div class="chat-control">
            <textarea ng-model="customer.typing"></textarea>
            <a href="javascript:;" ng-click="sendMessage(customer)">Send</a>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<script>
            var scriptData = {};
            scriptData.user = <?php echo json_encode(User::getCurrentUser()) ?>;
            scriptData.supportServiceURL = '<?php echo get_instance()->config->item('supportAdminURL') ?>?' + $.param(scriptData.user);
</script>