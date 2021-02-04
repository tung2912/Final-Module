import {AfterViewInit, Component, OnInit} from '@angular/core';

@Component({
  selector: 'app-nav',
  templateUrl: './nav.component.html',
  styleUrls: ['./nav.component.scss']
})
export class NavComponent implements OnInit, AfterViewInit {

  constructor() {
  }

  ngOnInit(): void {
  }

  ngAfterViewInit(): void {
    // const hamburger = document.querySelector('#hamburger1');
    // const mobileMenu = document.querySelector('.header .header__nav-bar .header__nav-list ul');
    // const menu_item =  document.querySelectorAll('.header .header__nav-bar .header__nav-list ul li a');
    // const header = document.querySelector('.header.header-container');

    // console.log(hamburger);
    // console.log(mobileMenu);

    // hamburger.addEventListener('click', () => {
    //   console.log(hamburger);
    //   hamburger.classList.toggle('active');
    //   mobileMenu.classList.toggle('active');
    // });


    // document.addEventListener('scroll', () => {
    //   var scroll_position = window.scrollY;
    //   if(scroll_position > 250) {
    //     header.style.backgroundColor = "#29323c";
    //   }
    //   else {
    //     header.style.backgroundColor = "transparent";
    //   }
    // });
    //
    // menu_item.forEach((item) => {
    //   item.addEventListener('click', () => {
    //     hamburger.classList.toggle('active');
    //     mobile_menu.classList.toggle('active');
    //   });
    // });
//
// ScrollReveal().reveal('.services__item',{
//   distance: '50px', origin: "top" ,duration: 600, delay: 200 , interval: 200 , reset : true
// });

  }

  toggle() {
    const hamburger = document.querySelector('.hamburger');
    const mobileMenu = document.querySelector('.header .header__nav-bar .header__nav-list ul');
    const bar = document.querySelector('.bar');
    hamburger.classList.toggle('active');
    mobileMenu.classList.toggle('active');
    bar.classList.toggle('active');

  }
}
