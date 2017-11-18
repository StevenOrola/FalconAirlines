<div class="row">
	<table class="table">
        <thead>
            <tr>
                <th>Flight</th>
                <th>To</th>
            </tr>
        </thead> 
        <tbody>
            {schedules}
            <tr>
                <td><a href="/flight/show/{planeCode}">{planeCode}</a></td>
                <td>{dest}</td>
            <tr/>
            {/schedules}
        </tbody>
    </table>
</div>