<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <?php
        $i = 0;

        foreach (App\Banner::where('status', '=', '1')->where('project', '=', 'shop')->get() as $banner) {
            if ($i == 0) $active = "active";
            else $active = "";
            echo "<li data-target='#carousel-example-generic' data-slide-to='" . $i . "' class='" . $active . "'></li>";
            $i++;
        }
        ?>

    </ol>

    <div class="carousel-inner" role="listbox">

        <?php
        $i = 0;
        foreach (App\Banner::where('status', '=', '1')->where('project', '=', 'shop')->get() as $banner) {
            if ($i == 0) $active = "active";
            else $active = "";
            echo "<div class='item " . $active . "'><a href=''><img src='http://media.jangolo.cm/banners/" . $banner->image->image . "' alt=''></a></div>";
            $i++;
        }
        ?>


    </div>

    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
