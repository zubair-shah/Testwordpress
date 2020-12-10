import React, { Component } from 'react';
import { render } from 'react-dom';

export default function MenuBuilder (props){
  const {menus} = props;
  // menus.general = 'General';
  // console.log(menus);
  const menuArray = Object.keys(menus);
  menuArray.unshift('general');

  // const menus = [
  //   {
  //     key: 'general',
  //     text: 'General'
  //   },
  //   {
  //     key: 'geo',
  //     text: 'Geo'
  //   },
  //   {
  //     key: 'asset',
  //     text: 'Asset'
  //   },
  //   {
  //     key: 'taxonomy',
  //     text: 'Taxonomy'
  //   },
  // ];
  return(
    <div className={"scwp-tab-menu-wrapper"}>
      {
        menuArray.map((menu) => {
          return(<button key={`menu_${menu}`} type='button' className={ props.menuId === menu ? 'active scwp-tab-menu-button' : 'scwp-tab-menu-button' } onClick={props.changeMenu.bind(this, menu)}>{ menu==='general' ? 'General' : menus[menu] }</button>);
        })
      }
    </div>
  );
}
