<div ng-controller="UsersController">
    <div class="row">
        <div class="container">
            <form ng-submit="getUsers()">
                <div class="input-group mb-3">
                    <input type="text" ng-model="count" class="form-control"
                           placeholder="تعداد را وارد کنید"
                           aria-label="تعداد وارد کنید">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit"
                                id="button-addon2">مشاهده
                        </button>
                    </div>
                </div>
            </form>
            <br>
            <br>
            <div class="user-item">
                <span>ردیف</span>
                <span>تصویر کاربری</span>
                <span class="item name">نام و نام خانوادگی</span>
                <span class="item state">استان</span>
                <span class="item city">شهر</span>
                <span class="item phone">شماره تماس</span>
            </div>
                <div class="user-item" ng-repeat="obj in users">
                    <span>@{{ $index + 1 }}</span>
                    <span><img class="avatar" src="@{{ obj.picture.medium }}"/></span>
                    <span class="item name">@{{ obj.name.first }} @{{ obj.name.last }}</span>
                    <span class="item state">@{{ obj.location.state }} </span>
                    <span class="item city">@{{ obj.location.city }} </span>
                    <span class="item phone">@{{ obj.phone }} </span>
                </div>

        </div>
    </div>
</div>