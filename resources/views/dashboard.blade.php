<x-app>
    @cannot('dashboard_view')
    <x-error-page/>
    @endcannot
    @can('dashboard_view')
    <div class="dashboard">
        <div class="d-flex gap-3 mb-3">
            <div class="pill-period rounded-pill border px-3 py-1" data-period="week">
                Semana
            </div>
            
            <div class="pill-period rounded-pill border px-3 py-1" data-period="month">
                Mês
            </div>
            
            <div class="pill-period rounded-pill border px-3 py-1" data-period="year">
                Ano
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card d-flex flex-column justify-content-between p-4">
                    <p class="description p-0 m-0 text-graybold">VENDAS</p>
                    <p class="quantity p-0 m-0 text-graylight" id="sales">0</p>
                </div>
            </div>
    
            <div class="col-md-4 mb-3">
                <div class="card d-flex flex-column justify-content-between p-4">
                    <p class="description p-0 m-0 text-graybold">COMISSÕES</p>
                    <p class="quantity p-0 m-0 text-graylight" id="comissions">0</p>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card d-flex flex-column justify-content-between p-4">
                    <p class="description p-0 m-0 text-graybold">TOTAL</p>
                    <p class="quantity p-0 m-0 text-graylight" id="total">R$ 0,00</p>
                </div>
            </div>
        </div>
    </div>
    @endcan

    @push('js')
    <script>
        const $periodPills = document.querySelectorAll('.pill-period');
        const $sales = document.querySelector('#sales');
        const $comissions = document.querySelector('#comissions');
        const $total = document.querySelector('#total');

        $periodPills.forEach(element => {
            element.addEventListener('click', switchPeriod);
        });

        function cardsData() {
            fetch('api/data')
            .then(response => response.json())
            .then(({data}) => {
                $sales.textContent = data.sales;
                $comissions.textContent = data.comissions;
                $total.textContent = Number(data.total).toLocaleString('BRL', {style: 'currency', currency: 'BRL'});
            });
        }

        function currentPeriod() {
            const currentPill = localStorage.getItem('current-pill');

            if (currentPill) {
                $periodPills.forEach(element => {
                    if (element.dataset.period == currentPill) {
                        element.classList.add('selected');
                    }
                });
            }
        }

        function switchPeriod(e) {
            const element = e.target;

            $periodPills.forEach(element => {
                element.classList.remove('selected');
            }); 

            element.classList.add('selected');

            localStorage.setItem('current-pill', element.dataset.period);
        }

        cardsData();
        currentPeriod();
    </script>
    @endpush
</x-app>
