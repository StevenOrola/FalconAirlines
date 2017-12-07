<form class="form-horizontal" role="form" action="/booking/search" method="post">
    <div class="form-group">
        <div class="col-sm-12">
            <select class="form-control" id="from" name="from" required>
                <option value disabled selected hidden>From</option>
                <option value="YCD">YCD</option>
                <option value="YDT">YDT</option>
                <option value="YXC">YXC</option>
                <option value="ZGF">ZGF</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-12">
            <select class="form-control" id="to" name="to" required>
                <option value disabled selected hidden>To</option>
                <option value="YCD">YCD</option>
                <option value="YDT">YDT</option>
                <option value="YXC">YXC</option>
                <option value="ZGF">ZGF</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-default">Search</button>
        </div>
    </div>
</form>