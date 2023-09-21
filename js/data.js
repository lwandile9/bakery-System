
   // List of bread objects

const breadProducts=[

    {
     image:"../imgs/selling-products/brown-b.jpg",
     productName:"brown",
     productPrice:"9.90",
     productQuantity:"1",
     productDiscount:"3"
    
    },{
        image:"../imgs/selling-products/white-b.jpg",
        productName:"white",
        productPrice:"10.50",
        productQuantity:"1",
        productDiscount:"16"
       
       },{

        image:"../imgs/selling-products/dumpy-b.jpg",
        productName:"dumpy",
        productPrice:"6.70",
        productQuantity:"1",
        productDiscount:"20"
       
       
    },{
        image:"../imgs/selling-products/yellow-b.jpg",
        productName:"yellow",
        productPrice:"11.40",
        productQuantity:"1",
        productDiscount:"13"
       
       }

];

     // List of doughnuts objects
     
const doughnutsProducts=[

    {
     image:"../imgs/selling-products/cruller-d.jpg",
     productName:"Crullers",
     productPrice:"3.60",
     productQuantity:"1",
     productDiscount:"30"
    
    },{
        image:"../imgs/selling-products/mochi-d.jpg",
        productName:"Mochi",
        productPrice:"15.70",
        productQuantity:"1",
        productDiscount:"13"
       
       },{

        image:"../imgs/selling-products/glazed-d.jpg",
        productName:"Glazed",
        productPrice:"8.70",
        productQuantity:"1",
        productDiscount:"17"
       
       
    },{
        image:"../imgs/selling-products/vegan-d.jpg",
        productName:"Vegan",
        productPrice:"12.00",
        productQuantity:"1",
        productDiscount:"3"
       
       }

];
     // List of Cookies objects

const cookiesProducts=[

    {
     image:"../imgs/selling-products/bar-c.jpg",
     productName:"Bar",
     productPrice:"9.90",
     productQuantity:"1",
     productDiscount:"3"
    
    },{
        image:"../imgs/selling-products/pressed-c.jpg",
        productName:"Pressed",
        productPrice:"12.50",
        productQuantity:"1",
        productDiscount:"5"
       
       },{

        image:"../imgs/selling-products/mooled.c.jpg",
        productName:"Molded",
        productPrice:"6.60",
        productQuantity:"1",
        productDiscount:"2"
       
       
    },{
        image:"../imgs/selling-products/Refrigerator-c.jpg",
        productName:"Refrigerated",
        productPrice:"42.40",
        productQuantity:"1",
        productDiscount:"11"
       
       }

];
   



//Cart data

const cartData =[
    {
      productName:"wowo",
      quantity: 4
    },
    {
      productName:"wowo",
      quantity: 4
    }
  
  
  ];
  

let json_str = JSON.stringify(cartData);
createCookie('mycookie', json_str);