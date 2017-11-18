<div class="row">
	<div>
        <form role="form" action="/fleet/submit" method="post">
            {fmodel}
            {fmanufacturer}
            {fseats}
            {freach}
            {fcruise}
            {ftakeoff}
            {fhourly}
            {zsubmit}
        </form>
        <a href="/fleet/cancel"><input type="button" value="Cancel"/></a>
        <a href="/fleet/delete"><input type="button" value="Delete"/></a>
    </div>
    <br/>
</div>