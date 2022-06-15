@extends("layouts.front_layouts.front_layout")
@section("front_css")
<style>
/* HIDE RADIO */
[type=radio] { 
  position: absolute;
  opacity: 0;
  width: 0;
  height: 0;
}

/* IMAGE STYLES */
[type=radio] + img {
  cursor: pointer;
}

/* CHECKED STYLES */
[type=radio]:checked + img {
  outline: 2px solid #f00;
}
</style>

@endsection
@section('content')
<div class="span9">
    <ul class="breadcrumb">
		<li><a href="{{url('/')}}">Home</a> <span class="divider">/</span></li>
		<li><a class="active" href="{{url('/custom-tailors')}}">Custom Tailor</a></li>
    </ul>
	<h2> CREATE YOUR MEASUREMENTS WITH MASTER FIT</h2>	
	<hr class="soft"/>
	
	<div class="row">
	@if(Session::has('success_message'))
     <div class="alert alert-success" role="alert">
       {{Session::get('success_message')}}
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
     @endif
    @if(Session::has('error_message'))
        <div class="alert alert-danger" role="alert">
        {{Session::get('error_message')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    @endif
		
		<div class="span1"> &nbsp;</div>
            <div class="span8">
                <div class="accordion-group">
                    <div class="accordion-heading">
                        <h3><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                        1. Height And Chest Size
                        </a></h3>
                    </div>
                    <div id="collapseOne" class="accordion-body collapse"  >
                   
                        <div class="accordion-inner">
                        <label class="control-label" style="font-size:20px; text-align:center;padding-bottom:10px;">Height (in feet and inches)</label>
                            <div class="span" >
                                <div class="control-group">
                                    <div class="controls">
                                        <select name="feet" style="width:300px;height:40px;font-size:18px;">
                                            <option>Feet</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <select name="feet" style="width:300px;height:40px;font-size:18px;margin-left:10px;">
                                            <option>Inches</option>
                                            <option>0</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>8</option>
                                            <option>9</option>
                                            <option>10</option>
                                            <option>11</option>
                                        </select>
                                    </div>
                                    
                                </div>
                            <div class="span">
                            <label class="control-label" style="font-size:20px; text-align:center;padding-bottom:10px;">Chest Size (in inches) </label>
                                <div class="control-group">
                                    <div class="controls">
                                        <select name="feet" style="width:610px;height:40px;font-size:18px;">
                                            <option>Inches</option>
                                            <option>0</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>8</option>
                                            <option>9</option>
                                            <option>10</option>
                                            <option>11</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="accordion-group">
                    <div class="accordion-heading">
                        <h3><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                        2. Body Type and Shape
                        </a></h3>
                    </div>
                    <div id="collapseTwo" class="accordion-body collapse"  >
                        <div class="accordion-inner">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </div>
                    </div>
                </div>
                <div class="accordion-group">
                    <div class="accordion-heading">
                        <h3><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
                        3. Shoulder Type
                        </a></h3>
                    </div>
                    <div id="collapseThree" class="accordion-body collapse"  >
                        <div class="accordion-inner">
                            
                        </div>
                    </div>
                </div>
                <div class="accordion-group">
                    <div class="accordion-heading">
                        <h3><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour">
                        4. Hip Shape
                        </a></h3>
                    </div>
                    <div id="collapseFour" class="accordion-body collapse"  >
                        <div class="accordion-inner">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </div>
                    </div>
                </div>
                <div class="accordion-group">
                    <div class="accordion-heading">
                        <h3><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFive">
                        5. Trouser Waist Position
                        </a></h3>
                    </div>
                    <div id="collapseFive" class="accordion-body collapse"  >
                        <div class="accordion-inner">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </div>
                    </div>
                </div>
                &nbsp;
                <div>
                @if(Auth::check())
                    <button type="submit" class="btn btn-lg btn-primary">Submit And Generate Measurement</button>
                @else 
                    <button type="submit" class="btn btn-lg btn-primary customtailorz">Submit And Generate Measurement</button>
                @endif 
                </div>

            </div>
		</div>
	</div>	
	
</div>
@endsection

