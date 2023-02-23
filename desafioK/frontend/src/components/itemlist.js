import React from 'react';

import "../css/itemlist.css";

import Cadastrocliente from './cadastrocliente';
import Cadastroitem from './cadastroitem';
import Produtos from './produtos';

const Itemnav = ({active, turnActive}) => {
    return ( 
        <ul className='options-container'>
            <li 
                className={active === 1  ? 'item' : 'display-none'}
                onClick = {() => turnActive(1)}
            ><Cadastrocliente/></li>
            <li 
                className={active === 2  ? 'item' : 'display-none'}
                onClick = {() => turnActive(2)}
            ><Cadastroitem/></li>
            <li 
                className={active === 3  ? 'item' : 'display-none'}
                onClick = {() => turnActive(3)}
            ><Produtos/></li>
            <li 
                className={active === 4  ? 'item' : 'display-none'}
                onClick = {() => turnActive(4)}
            >Buscar</li>
        </ul>
     );
}
 
export default Itemnav;