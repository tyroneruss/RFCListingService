<?php 
    include '../includes/header.php';   

 ?>
    <form action="checklogin.php" method="POST">  
    <table border="0" width="1000"  height='450'  style="background-color: #FFFFFF;">
        <tr>
        <td width='400'  valign="top" >
            <table border="0" width='300' height='640' valign="top"  style="background-color: lightgray;">
               <tr>
                      <td colspan="2" valign="bottom" height='70' style="background-color: #FFFFFF;"> 
                         
                     </td>
                </tr>   
               <tr >
                      <td colspan="2" id="right_pane_title" align="center" valign="center"> 
                          <b>Build Mailer List</b>
                     </td>
                </tr>   
                <tr  style="background-color: #FFFFFF;">
                     <td width='20%' height='5' align="center"> 
                         <img src="../images/CreditCard.gif" width="40px" height="40px" alt="AddCreditor"/>
                     </td>
                     <td width='80%' style="color: #660000; font-family: Times New Roman; font-size: 18px;"> 
                         &nbsp;&nbsp;Create Foreclosure Mailer
                     </td>
                </tr>   
               <tr>
                      <td colspan="2" id="right_pane_title" align="center" valign="center"  > 
                          <b>Key Performance Indicators</b>
                     </td>
                </tr>   
                <tr  style="background-color: #FFFFFF;">
                     <td width='20%' height='5' align="center"> 
                         <img src="../images/AddCreditor.gif" width="40px" height="40px" alt="AddCreditor"/>
                     </td>
                     <td width='80%' style="color: #660000; font-family: Times New Roman; font-size: 18px;" style="background-color: #FFFFFF;"> 
                         &nbsp;&nbsp;Loan Modification Success
                     </td>
                </tr>   
                <tr  style="background-color: #FFFFFF;">
                     <td width='20%' height='5' align="center" > 
                         <img src="../images/Offer_Eval.png" width="40px" height="40px" alt="AddCreditor"/>
                     </td>
                     <td width='80%' style="color: #660000; font-family: Times New Roman; font-size: 18px;" > 
                         &nbsp;&nbsp;Refund/Charge backs
                     </td>
                </tr>   
                <tr  style="background-color: #FFFFFF;">
                     <td width='20%' height='5' align="center" > 
                         <img src="../images/CreditCard.gif" width="40px" height="40px" alt="AddCreditor"/>
                     </td>
                     <td width='80%' style="color: #660000; font-family: Times New Roman; font-size: 18px;" > 
                         &nbsp;&nbsp;Mailers - Matrices
                     </td>
                </tr>   
                <tr>
                     <td width='20%' height='120' align="center" > 
                     </td>
                     <td width='80%' style="font-family: Times New Roman; font-size: 18px;" > 
                         <br><br><br>
                     </td>
                </tr>   
                <tr>
                     <td width='20%' height='120' align="center" > 
                     </td>
                     <td width='80%' style="font-family: Times New Roman; font-size: 18px;" > 
                         <br><br><br>
                     </td>
                </tr>   
             </table>
        </td>  
        <td height="50">
            &nbsp;
        </td>
        <td align="left" valign='top' style="background-color: white;" >
   
            <div align="center" style="font-size: 30px; font-family: Times New Roman; color: #660000">
                <br>Russ Law Group Intranet
            </div>

            <table border="0" id="loginformtable">
               <tbody>
               <tr>
                   <td colspan="5">
                       &nbsp;
                   </td>
               </tr>                    
               <tr>
                   <td colspan="5" align="center">            
                       <h1 id="login_h1">
                            <img src="../images/sign-in.gif" width="60px" height="60px" alt="AddCreditor"/>
                           <B>Please Login</B>
                       </h1>
                   </td>
               </tr>
                <tr >
                    <td colspan="5" align="center" height="30" valign="center" style="color: #660000; font-family: Times New Roman; font-size: 18px">
                     Fields marked with a red asterisk (<font color="red">*</font>) are required
                     <?php
                         if(!empty($_GET['message'])) {
                             $message = $_GET['message'];
                             echo '<br><font color="red" size="4">' . $message . '</font>';
                         }                       
                     ?>
                     <br><br>
                     Username&nbsp;&nbsp;
                     <input id="user_input" type="text" name='username' Required />&nbsp;
                     <br><br>
                     Password&nbsp;&nbsp;
                     <input id="user_input" type="password" name='password' Required />
                     <a href="login.php"></a>
                     <br><br>
                    </td>
                </tr>
                <br>
                <tr>
                     <td colspan="5" align="center" height="60" align="center" valign="top" 
                        style="font-family: Times New Roman; font-size: 20px;" >
                        <input type="button" value="CANCEL" 
                        onclick="window.location.href='javascript:history.back()'"                          
                        style="color: white; height: 35px; width: 100px;"
                        id="frmButton" />
                        &nbsp; &nbsp;
                        <input type="submit" value="LOGIN" 
                               style="color: white; height: 35px; width: 100px;"
                               id="frmButton" />
                        <br>
                        <br>
                     </td>
                 </tr>
        </table>
       <br><br><br>
    </td>
    </tr>
    </table> 
    </form>
    &nbsp;&nbsp;
    </body>
</html>