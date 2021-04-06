@extends('admin.layout.index')


@section('content')
<div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
               
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Địa chỉ</h2>
                            
                            <div class="panel-body">
                
                <p>2006 - Tòa A10CT1 Nam Trung Yên, Nguyễn Chánh, Yên Hòa, Cầu Giấy, Hà Nội </p>

                <h4><span class="glyphicon glyphicon-envelope"></span> Email : </h4>
                <p>hrapatek@gmail.com </p>

                <h4><span class="glyphicon glyphicon-phone-alt"></span> Điện thoại : </h4>
                <p>1900969670 </p>
                <br><br>
                <h3><span class="glyphicon glyphicon-globe"></span> Bản đồ</h3>
                <div class="break"></div><br>
                
                    <div id="map" style="width:500px;height:500px;">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14897.822508805324!2d105.78134266139406!3d21.01444767828739!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab68896793c9%3A0x9fcb0b4cae00323!2sT%C3%B2a%20nh%C3%A0%20CT1%20-%20A10%20Nam%20Trung%20Y%C3%AAn!5e0!3m2!1svi!2s!4v1617357411973!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                

            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection