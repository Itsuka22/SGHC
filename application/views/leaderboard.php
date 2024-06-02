<!-- <link rel="stylesheet" type="text/css" href="/assets/page/leaderboard.css"> -->
<div class="banner">
  <div class="col headerImg" style="background-image: url('<?php echo base_url()?>assets/img/bgutama.svg');">
          <div class="title-leader">
            <h1>Leaderboard</h1>
            <p>Digunakan untuk memantau peringkat peserta healthy challenges</p>
          </div>
  </div>
</div>
  <main class="table" id="customers_table">
        <section class="table__header">
            <h5>Leaderboard</h5>
            <!-- <div class="input-group">
                <input type="search" placeholder="Search Data...">
                <img src="images/search.png" alt="">
            </div> -->
            <!-- <div class="export__file">
                <label for="export-file" class="export__file-btn" title="Export File"></label>
                <input type="checkbox" id="export-file">
                <div class="export__file-options">
                    <label>Export As &nbsp; &#10140;</label>
                    <label for="export-file" id="toPDF">PDF <img src="images/pdf.png" alt=""></label>
                    <label for="export-file" id="toJSON">JSON <img src="images/json.png" alt=""></label>
                    <label for="export-file" id="toCSV">CSV <img src="images/csv.png" alt=""></label>
                    <label for="export-file" id="toEXCEL">EXCEL <img src="images/excel.png" alt=""></label>
                </div> -->
            </div>
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                      <th width="20px">No</th>
                      <th>Name</th>
                      <th width="100px">Point<span class="icon-arrow">&UpArrow;</span></th>
                      <th width="100px">Detail</th>
                    </tr>
                </thead>
                <tbody>
                  <!-- <?php $no=1; foreach ($leaderboard as $row): ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['activity_count']; ?></td>
                        <td><?php echo $row->point; ?></td>
                    </tr>
                    <?php endforeach; ?> -->
                    <tr>
                      <td> 1 </td>
                        <td> Zinzu Chan Lee</td>
                        <td> 90 </td>
                        <td><button class="detail-button" onclick="showDetail('detail1')">Detail</button></td>
                    </tr>
                </tbody>
            </table>
                <div id="detail1" class="detail-popup">
              <div class="detail-content">
                  <span class="close" onclick="closeDetail('detail1')">&times;</span>
                  <p>Additional details about Zinzu Chan Lee...</p>
              </div>
          </div>
        </section>
    </main>


<style>
  /*
Responsive HTML Table With Pure CSS - Web Design/UI Design

Code written by:
👨🏻‍⚕️ Coding Design (Jeet Saru)

> You can do whatever you want with the code. However if you love my content, you can **SUBSCRIBED** my YouTube Channel.

🌎link: www.youtube.com/codingdesign 
*/


@media print {
  .table, .table__body {
  overflow: visible;
  height: auto !important;
  width: auto !important;
  }
}

@page {
  size: landscape;
  margin: 0; 
  justify-content: center;
}


main.table {
  /* margin-top: 8%; */
  margin-bottom: 10em;
  margin-left: 10%;
  width: 82vw;
  height: 90vh;
  background-color: #fff5;
  position: relative;
  backdrop-filter: blur(7px);
  box-shadow: 0 .4rem .8rem #0005;
  border-radius: .8rem;
  overflow: hidden;
}

.table__header {
  width: 100%;
  height: 10%;
  background-color: #fff4;
  padding: .8rem 1rem;

  display: flex;
  justify-content: space-between;
  align-items: center;
}

.table__header .input-group {
  width: 35%;
  height: 100%;
  background-color: #fff5;
  padding: 0 .8rem;
  border-radius: 2rem;

  display: flex;
  justify-content: center;
  align-items: center;

  transition: .2s;
}

.table__header .input-group:hover {
  width: 45%;
  background-color: #fff8;
  box-shadow: 0 .1rem .4rem #0002;
}

.table__header .input-group img {
  width: 1.2rem;
  height: 1.2rem;
}

.table__header .input-group input {
  width: 100%;
  padding: 0 .5rem 0 .3rem;
  background-color: transparent;
  border: none;
  outline: none;
}

.table__body {
  width: 95%;
  max-height: calc(89% - 1.6rem);
  background-color: #fffb;

  margin: .8rem auto;
  border-radius: .6rem;

  overflow: auto;
  overflow: overlay;
}


.table__body::-webkit-scrollbar{
  width: 0.5rem;
  height: 0.5rem;
}

.table__body::-webkit-scrollbar-thumb{
  border-radius: .5rem;
  background-color: #0004;
  visibility: hidden;
}

.table__body:hover::-webkit-scrollbar-thumb{ 
  visibility: visible;
}


table {
  width: 100%;
}

td img {
  width: 36px;
  height: 36px;
  margin-right: .5rem;
  border-radius: 50%;

  vertical-align: middle;
}

table, th, td {
  border-collapse: collapse;
  padding: 1rem;
  text-align: left;
}

thead th {
  position: sticky;
  top: 0;
  left: 0;
  background-color: #d5d1defe;
  cursor: pointer;
  text-transform: capitalize;
}

tbody tr:nth-child(even) {
  background-color: #0000000b;
}

tbody tr {
  --delay: .1s;
  transition: .5s ease-in-out var(--delay), background-color 0s;
}

tbody tr.hide {
  opacity: 0;
  transform: translateX(100%);
}

tbody tr:hover {
  background-color: #fff6 !important;
}

tbody tr td,
tbody tr td p,
tbody tr td img {
  transition: .2s ease-in-out;
}

tbody tr.hide td,
tbody tr.hide td p {
  padding: 0;
  font: 0 / 0 sans-serif;
  transition: .2s ease-in-out .5s;
}

tbody tr.hide td img {
  width: 0;
  height: 0;
  transition: .2s ease-in-out .5s;
}

.status {
  padding: .4rem 0;
  border-radius: 2rem;
  text-align: center;
}

.status.delivered {
  background-color: #86e49d;
  color: #006b21;
}

.status.cancelled {
  background-color: #d893a3;
  color: #b30021;
}

.status.pending {
  background-color: #ebc474;
}

.status.shipped {
  background-color: #6fcaea;
}

.detail-button {
    background-color: #006b21;
    border: none;
    color: white;
    padding: 8px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    cursor: pointer;
    border-radius: 10px;
    transition: background-color 0.3s ease;
}


.detail-button:hover {
    background-color: #005f75; /* Warna saat hover */
}


.detail-popup {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0,0.4);
}

.detail-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    border-radius: 12px; /* Membuat sudut popup lebih halus */
}
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}



@media (max-width: 1000px) {
  td:not(:first-of-type) {
      min-width: 12.1rem;
  }
}

thead th span.icon-arrow {
  display: inline-block;
  width: 1.3rem;
  height: 1.3rem;
  border-radius: 50%;
  border: 1.4px solid transparent;
  
  text-align: center;
  font-size: 1rem;
  
  margin-left: .5rem;
  transition: .2s ease-in-out;
}

thead th:hover span.icon-arrow{
  border: 1.4px solid #6c00bd;
}

thead th:hover {
  color: #6c00bd;
}

thead th.active span.icon-arrow{
  background-color: #6c00bd;
  color: #fff;
}

thead th.asc span.icon-arrow{
  transform: rotate(180deg);
}

thead th.active,tbody td.active {
  color: #6c00bd;
}

.export__file {
  position: relative;
}

.export__file .export__file-btn {
  display: inline-block;
  width: 2rem;
  height: 2rem;
  background: #fff6 url(images/export.png) center / 80% no-repeat;
  border-radius: 50%;
  transition: .2s ease-in-out;
}

.export__file .export__file-btn:hover { 
  background-color: #fff;
  transform: scale(1.15);
  cursor: pointer;
}

.export__file input {
  display: none;
}

.export__file .export__file-options {
  position: absolute;
  right: 0;
  
  width: 12rem;
  border-radius: .5rem;
  overflow: hidden;
  text-align: center;

  opacity: 0;
  transform: scale(.8);
  transform-origin: top right;
  
  box-shadow: 0 .2rem .5rem #0004;
  
  transition: .2s;
}

.export__file input:checked + .export__file-options {
  opacity: 1;
  transform: scale(1);
  z-index: 100;
}

.export__file .export__file-options label{
  display: block;
  width: 100%;
  padding: .6rem 0;
  background-color: #f2f2f2;
  
  display: flex;
  justify-content: space-around;
  align-items: center;

  transition: .2s ease-in-out;
}

.export__file .export__file-options label:first-of-type{
  padding: 1rem 0;
  background-color: #86e49d !important;
}

.export__file .export__file-options label:hover{
  transform: scale(1.05);
  background-color: #fff;
  cursor: pointer;
}

.export__file .export__file-options img{
  width: 2rem;
  height: auto;
}

@media (max-width: 450px) {

  .title-leader {
    margin-left: auto !important;;
    margin-top: 15em; /* Kurangi margin-top untuk tampilan yang lebih baik pada layar kecil */
  }
}
</style>

<script>
  function showDetail(id) {
    document.getElementById(id).style.display = "block";
}

function closeDetail(id) {
    document.getElementById(id).style.display = "none";
}
</script>
