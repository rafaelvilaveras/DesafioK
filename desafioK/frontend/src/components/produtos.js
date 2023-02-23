import React from 'react';
import useAxios from '../hooks/useAxios';
import axios from '../apis/geral';

import '../css/itemsconfig.css';

const Produtos = () => {

    const [produto, error, loading, refetch] = useAxios({
        axiosInstance: axios,
        method: 'GET',
        url: '/read.php',
        requestConfig: {
            headers: {
                'Content-Language': 'en-Us',
                'Access-Control-Allow-Origin': '*' 
            }
        }
    });

    console.log(produto, error);

    return (
        <div className='container-lista'>
            {/* {loading && console.log('1')} */}
            {loading && <p>Loading...</p>}
            {/* {!loading && error && console.log('2')} */}
            {!loading && error && <p className='errMsg'>{error}</p>}
            {/* {!loading && !error && produto && console.log('3')} */}
            {!loading && error && produto.length > 0 && <div>
                <ul className='lista'>
                    <li className='id'>id</li>
                    <li className='nome'>nome</li>
                    <li className='email'>email</li>
                    <li className='telefone'>telefone</li>
                    <li className='cpf'>cpf</li>
                    <li className='tipo'>tipo</li>
                </ul>
                {produto.map((val, key) => {
                    return(
                        <ul key={key} className='lista'>
                            <li className='id'>{val.id}</li>
                            <li className='nome'>{val.nome}</li>
                            <li className='email'>{val.email}</li>
                            <li className='telefone'>{val.telefone}</li>
                            <li className='cpf'>{val.cpf}</li>
                            <li className='tipo'>{val.tipo}</li>
                        </ul> 
                )

            })}</div>}
            {/* {!loading && !error && !produto && console.log('4')} */}
            {!loading && !error && !produto && <p>Sem produtos</p>}
            <button onClick={() => refetch()}>refetch</button>
        </div>
     );
}
 
export default Produtos;