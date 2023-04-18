<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COMPROBANTE DE LA FACTURA</title>
</head>
<body>
    <style>
    @page {
      margin: 100px 25px;
    }
    header {
        position: fixed;
        top: -60px;
        height: 50;
        color: white;
        text-align: center;
        
    }

    footer {
        position: fixed;
        bottom: -60px;
        height: 50px;
        background-color: #752727;
        color: white;
        text-align: center;
        line-height: 35px;
    }

    thead th{
        background: lightgray; 
    }
    h1 {
        text-align:center;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    table, th, td {
        border: 1px solid;
    }
    </style>
     <header>
        <img src="<?=base_url('/public/img/headerPdf.jpeg')?>" width="700" height="190">
        
    </header>

    <footer>
    <img src="<?=base_url('/public/img/footerPdf.jpeg')?>" width="700" height="80">
    </footer>

    <main><br><br><br><br><br><br><br>
    <h1>FACTURA</h1><br>
    <table>
      <thead>
        <tr>
          <th>NOMBRE DEL ESTUDIANTE</th>
          <th>CURSO</th>
          <th>VALOR</th>
          <th>FECHA DE PAGO</th>
          <th>FORMA DE PAGO</th>
          <th>DOC. DE PAGO</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach($pago as $data){
        ?>
        <td style="text-align:center" ><?=$data['ESTNOMBRE']?></td>
        <td style="text-align:center" ><?=$data['CURNOMBRE']?></td>
        <td style="text-align:center" >$ <?=$data['PAGCUOTA']?></td>
        <td style="text-align:center" ><?=$data['PAGFECREGPAGO']?></td>
        <td style="text-align:center" ><?=$data['PAGFORMAPAGO']?></td>
        <td style="text-align:center" ><?=$data['PAGNUMDOCPAGO']?></td>
        <?php
        }
        ?>
      </tbody>
    </table><br><br><br>
    <table style="border: none;">
      <thead>
        <tr>
          <th>FIRMA DE AUTORIZACION</th>
          <th>FIRMA DEL CLIENTE</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
          <center><img src="<?=base_url('/public/img/firma.png')?>" width="300" height="115"></center>
          </td>
          <td>
            
          </td>
        </tr>
      </tbody>
    </table>
    </main>
</body>
</html>