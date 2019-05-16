<div ng-controller="CategoryController">
    <div class="row">
        <div class="col">
            <div class="card min-h-400">
                <div class="card-header text-center">
                    دسته بندی ها
                </div>
                <div class="card-body">
                    <form ng-submit="submit()">
                        <div class="input-group mb-3">
                            <input type="text" ng-model="title" class="form-control"
                                   placeholder="دسته بندی جدیدی وارد کنید"
                                   aria-label="دسته بندی جدیدی وارد کنید">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit"
                                        id="button-addon2">ثبت
                                </button>
                            </div>
                        </div>
                    </form>
                    <table class="table">
                        <tbody>
                        <tr ng-repeat="category in categories">
                            <th scope="row">@{{ $index + 1 }}</th>
                            <td>@{{ category.title }}</td>
                            <td class="table-buttons">
                                <button ng-click="delete(category.id)"
                                        class="btn btn-outline-danger btn-sm"
                                        data-title="Delete" data-toggle="modal"
                                        data-target="#delete" title="حذف">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>