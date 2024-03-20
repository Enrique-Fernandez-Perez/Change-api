export class Shop {
    shopItems: any;

    constructor() {
    this.shopItems = [
    {
    title: 'Camiseta Paisaje',
    desc: 'Camiseta con ilustraciones paisajísticas',
    picture:
   // 'assets/images/paisaje.jpg',
   'assets/images/camiseta1.jpg',
    price: 164
    },
   
   { title: 'Camiseta retrato',
   desc: 'Retrato de tu personaje favorito',
   // picture: 'assets/images/popeye.jpg',
   picture: 'assets/images/camiseta2.jpg',
   price: 220
   },
   {
   title: 'Camiseta personalizada',
   desc: 'Muñecos realizados a mano con las características que te gusten',
   // picture: 'assets/images/personalizada.jpg',
   picture: 'assets/images/camiseta3.jpg',
   price: 420
   }
   ];
}
}
