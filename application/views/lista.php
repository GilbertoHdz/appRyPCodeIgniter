<style type="text/css">
.parentTbl table {
  border-spacing: 0;
  border-collapse: collapse;
  border: 0;
  width: 690px;
}
.childTbl table {
  border-spacing: 0;
  border-collapse: collapse;
  border: 1px solid #d7d7d7;
  width: 665px;
}
.childTbl th,
.childTbl td {
  border: 1px solid #d7d7d7;
  min-width: 200px;
}
.scrollData {
  width: 690;
  height: 150px;
  overflow-x: hidden;
}
</style>




<div class="parentTbl">
  <table>
    <tr>
      <td>
        <div class="childTbl">
          <table class="childTbl">
            <tr>
              <th>Header 1</th>
              <th>Header 2</th>
              <th>Header 3</th>
              <th>Header 4</th>
              <th>Header 5</th>
              <th>Header 6</th>
            </tr>
          </table>
        </div>
      </td>
    </tr>
    <tr>
      <td>
        <div class="scrollData childTbl">
          <table>
           <?php foreach ($consulta as $fila): ?>
	            <tr>
	              <td><?php print($fila->firstname) ?></td>
	              <td>Table Data 2</td>
	              <td>Table Data 3</td>
	              <td>Table Data 4</td>
	              <td>Table Data 5</td>
	              <td><a href="<?php print(base_url()) ?>pdf_ci/index/<?php print($fila->id) ?>">Show</a></td>
	            </tr>
            <?php endforeach ?>
          </table>
        </div>
      </td>
    </tr>
  </table>
</div>




