@extends('header')

@section('content')


<div class="row ">
    <div class="col-md-2 bordered_div">ID</div><div class="col-md-10 bordered_div"><?php echo $id ?></div>
    <div class="col-md-2 bordered_div">Name</div><div class="col-md-10 bordered_div"><?php echo $name ?></div>
    <div class="col-md-2 bordered_div">Achivements</div><div class="col-md-10 bordered_div ">


        <?php

        foreach($achivements as $details){

            echo "<img class='img_icon' src='".URL::to('/')."/img/".$details->icon."' title='".$details->title." - ".$details->desc."'>";
        }





        ?>

    </div>

</div>


@endsection