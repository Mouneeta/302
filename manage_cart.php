<?php
session_start(); 


if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_POST['add_to_cart']))
    {
        if(isset($_SESSION['cart']))
        {
            $myitems=array_column($_SESSION['cart'],'Item_Name');
            if(in_array($_POST['Item_Name'],$myitems))
            {
                if($_SESSION['cart'][$count]['Type']=='Ticket')
                {
                    echo "<script>alert('Item Already Added');
                         window.location.href='movies.php';
                         </script>";
    
                }
                else if($_SESSION['cart'][$count]['Type']=='Food')
                {
                    echo "<script>alert('Item Already Added');
                         window.location.href='portfolio.html';
                         </script>";
                }
                else if($_SESSION['cart'][$count]['Type']=='Merchandise Product')
                {
                    echo "<script>alert('Item Already Added');
                         window.location.href='merch.php';
                         </script>";
                }
            }
            else
            {
            $count=count($_SESSION['cart']);
            $_SESSION['cart'][$count]=array('Item_Name'=>$_POST['Item_Name'],'Price'=>$_POST['Price'],'Type'=>$_POST['Type'],'Quantity'=>1);
            if($_SESSION['cart'][$count]['Type']=='Ticket')
            {
                echo "<script>alert('Item Added');
                     window.location.href='movies.php';
                     </script>";

            }
            else if($_SESSION['cart'][$count]['Type']=='Food')
            {
                echo "<script>alert('Item Added');
                     window.location.href='portfolio.html';
                     </script>";
            }
            else if($_SESSION['cart'][$count]['Type']=='Merchandise Product')
            {
                echo "<script>alert('Item Added');
                     window.location.href='merch.php';
                     </script>";
            }
            }
        }
        else
        {
            $_SESSION['cart'][0]=array('Item_Name'=>$_POST['Item_Name'],'Price'=>$_POST['Price'],'Type'=>$_POST['Type'],'Quantity'=>1);
            if($_SESSION['cart'][0]['Type']=='Ticket')
            {
            echo "<script>alert('Item Added');
                       window.location.href='movies.php';
                       </script>";  
            }
            else if($_SESSION['cart'][0]['Type']=='Food')
            {
            echo "<script>alert('Item Added');
                       window.location.href='portfolio.html';
                       </script>";  
            }
            else if($_SESSION['cart'][0]['Type']=='Merchandise Product')
            {
            echo "<script>alert('Item Added');
                       window.location.href='merch.php';
                       </script>";  
            }

        }
    }

  
    
    if(isset($_POST['Remove_Item']))
    {
         foreach($_SESSION['cart'] as $key => $value)
      {
            if($value['Item_Name']==$_POST['Item_Name'])
            {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart']=array_values($_SESSION['cart']);
                echo"<script> 
                alert('Item Removed');
                window.location.href='myCart.php';
               </script>";
           }
        }
     }
     if(isset($_POST['Mod_Quantity']))
     {
         $ticketsQuantity=0;
        foreach($_SESSION['cart'] as $key => $value)
        {
              if($value['Item_Name']==$_POST['Item_Name'])
              {
                  $_SESSION['cart'][$key]['Quantity']=$_POST['Mod_Quantity'];

                  echo"<script> 
                  window.location.href='myCart.php';
                 </script>";
             }
          }
     }
}


?>