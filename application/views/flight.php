<div class="row">
    <table class="table">
        <thead>
            <tr>
                <th>Plane</th>
                <th>From</th>
                <th>Destination</th>
                <th>Departure</th>
                <th>Arrival</th>
            </tr>
        </thead> 
        <tbody>
            {schedules}
            <tr>
                <td><a href="/Fleet/show/{planeId}" >{planeId}</a></td>
                <td>{base}</td>
                <td>{dest}</td>
                <td>{departure}</td>
                <td>{arrival}</td>
            <tr/>
            {/schedules}
        </tbody>
    </table>
</div>