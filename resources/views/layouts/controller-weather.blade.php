<div ng-controller="WeatherController">
    <div class="row">
        <div class="container">
        <form ng-submit="getWeather()">
            <div class="input-group mb-3">
                <input type="text" ng-model="city" class="form-control"
                       placeholder="شهر وارد کنید"
                       aria-label="شهر وارد کنید">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit"
                            id="button-addon2">مشاهده
                    </button>
                </div>
            </div>
        </form>

        <div><span>شهر : </span>@{{cityOf}}</div>
        <div><span>کشور : </span>@{{country}}</div>
        <div><span>دمای هوا : </span>@{{temp}}</div>
        <div><span>کمترین دما : </span>@{{min}}</div>
        <div><span>بیشترین دما : </span>@{{max}}</div>
        <div><span>توضیحات : </span>@{{desc}}</div>
        </div>
    </div>
</div>