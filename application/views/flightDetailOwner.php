<div class="row">
	<div class="span4">
        <form role="form" action="/flight/submit" method="post">
            {fmodel} 
            <br />
            {fairline}
            <br />
            {fto}
            <br />
            {fterminal}
            <br />
            {fcommunity}
            {zsubmit}
        </form>
        <a href="/flight/cancel"><input type="button" value="Cancel"/></a>
        <a href="/flight/delete"><input type="button" value="Delete"/></a>
	</div>
    <br/>
</div>