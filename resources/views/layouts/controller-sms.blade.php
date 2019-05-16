<div ng-controller="SmsController">
    <div class="row">
        <div class="container">
            <form ng-submit="sendSms()">
                <div class="input-group mb-3">
                    <input type="text" ng-model="to" class="form-control"
                           placeholder="شماره وارد کنید"
                           aria-label="شماره وارد کنید">

                    <input type="text" ng-model="text" class="form-control"
                           placeholder="متن پیام را وارد کنید"
                           aria-label="متن پیام وارد کنید">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit"
                                id="button-addon2">ارسال
                        </button>
                    </div>
                </div>
            </form>

            <div> @{{ res }}</div>

        </div>
    </div>
</div>