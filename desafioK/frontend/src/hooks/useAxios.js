import { useEffect, useState } from 'react';

const useAxios = (configObj) => {

    const {
        axiosInstance,
        method,
        url,
        requestConfig = {}

    } = configObj;

    const [response, setResponse] = useState([]);
    const [error, setError] = useState('');
    const [loading, setLoading] = useState(true);
    const [reload, setReload] = useState(0);

    const refetch = () => setReload(prev => prev + 1);

    useEffect(() => {
        const controller = new AbortController();

        const fetchData = async () => {
            try {


                const res = await axiosInstance[method.toLowerCase()](url, {
                    ...requestConfig,
                    signal: controller.signal
                });

                console.log(res, 'res');
                setResponse(res.data['data']);
                console.log(response, 'response on try');
                console.log(1);
            } catch (err) {

                
                console.log(err.message, 'err.message');
                console.log(2); 
                setError(err.message);
                console.log(error);

            } finally {

                console.log(response, 'response on finally');
                console.log(error, 'error on finally');
                console.log(3);

                setLoading(false);
                // setError(false);

            }
        }

        fetchData();

        // useEffect cleanup function (tira o comentário da função abaixo)
        console.log('finalizou');
        return () => controller.abort();

    }, [reload])

    return [response, error, loading, refetch];

}

export default useAxios;