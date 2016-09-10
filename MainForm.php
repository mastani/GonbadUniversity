<div class="row">
    <ul class="nav nav-pills">
        <li class="active"><a data-toggle="pill" href="#info">مشخصات</a></li>
        <li><a data-toggle="pill" href="#info_more">مشخصات تکمیلی</a></li>
        <li><a data-toggle="pill" href="#image">تصویر</a></li>
        <li><a data-toggle="pill" href="#case">پرونده</a></li>
    </ul>

    <form class="form-horizontal" role="form">
        <div class="tab-content">
            <div id="info" class="tab-pane fade in active">
                <br/>
                <legend>مشخصات</legend>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-3" for="pname"><span class="red">*</span> نام</label>
                            <div class="col-sm-3 ptitle-container"></div>
                            <div class="col-sm-6 pname-container"></div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3" for="pfamily"><span class="red">*</span> نام خانوادگی</label>
                            <div class="col-sm-9 pfamily-container"></div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3" for="pfather">نام پدر</label>
                            <div class="col-sm-9 pfather-container"></div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-3" for="id_code"><span class="red">*</span> شماره شناسنامه</label>
                            <div class="col-sm-9 id_code-container"></div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3" for="national_code"><span class="red">*</span> کد ملی</label>
                            <div class="col-sm-9 national_code-container"></div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3" for="birthday">تاریخ تولد</label>
                            <div class="col-sm-9 birthday-container"></div>
                        </div>
                    </div>
                </div>

                <hr/>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-3" for="personnel_code">کد پرسنلی/مستخدم</label>
                            <div class="col-sm-9 personnel_code-container"></div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-3" for="file_code">کد پرونده/شناسایی</label>
                            <div class="col-sm-9 file_code-container"></div>
                        </div>
                    </div>
                </div>

                <hr/>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-3" for="employment">نوع استخدام</label>
                            <div class="col-sm-9 employment-container"></div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3" for="employment_date">تاریخ استخدام</label>
                            <div class="col-sm-9 employment_date-container"></div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3" for="position">پست سازمانی</label>
                            <div class="col-sm-9 position-container"></div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3" for="role">سمت</label>
                            <div class="col-sm-9 role-container"></div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-3" for="activity_area">حوزه فعالیت</label>
                            <div class="col-sm-9 activity_area-container"></div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3" for="activity_location">محل خدمت</label>
                            <div class="col-sm-9 activity_location-container"></div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3" for="marriage_status">وضعیت تاهل</label>
                            <div class="col-sm-9 marriage_status-container"></div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3" for="phone">تلفن منزل</label>
                            <div class="col-sm-9 phone-container"></div>
                        </div>
                    </div>
                </div>

                <hr/>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-3" for="degree">مدرک</label>
                            <div class="col-sm-9 degree-container"></div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-3" for="field">رشته تحصیلی</label>
                            <div class="col-sm-9 field-container"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="info_more" class="tab-pane fade">
                <br/>
                <legend>مشخصات تکمیلی</legend>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-2" for="birth_place">محل تولد</label>
                            <div class="col-sm-4 birth_place-container"></div>
                            <label class="col-sm-2" for="religion">مذهب</label>
                            <div class="col-sm-4 religion-container"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2" for="id_location">محل صدور</label>
                            <div class="col-sm-4 id_location-container"></div>
                            <label class="col-sm-2" for="military_state">وضعیت نظام وظیفه</label>
                            <div class="col-sm-4 military_state-container"></div>
                        </div>
                    </div>

                    <div class="col-md-6">

                    </div>
                </div>
            </div>

            <div id="image" class="tab-pane fade">
                <div class="col-md-6">
                    <br/>
                    <legend>انتخاب تصویر</legend>

                    <div id="imagePreview"></div>
                    <br/>
                    <label class="btn btn-primary">
                        انتخاب تصویر <input id="uploadFile" type="file" name="image" style="display: none;"
                                            class="img"/>
                    </label>
                </div>
            </div>

            <div id="case" class="tab-pane fade">
                <h3>Menu 3</h3>
                <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                    explicabo.</p>
            </div>
        </div>
    </form>
</div>