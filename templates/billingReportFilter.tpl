<div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingFour">
        <button class="accordion-button collapsed btn btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
        Reporte de facturación
        </button>
        </h2>
        <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">

                <form action="reporteFacturacion" method="POST">
                    <div class="row">
                        <div class="col">
                            <label class="col-form-label mt-4" for="inputDefault">Desde</label>
                            <input type="date" name="input-date1" class="form-control" required>       
                        </div>
                        <div class="col">
                            <label class="col-form-label mt-4" for="inputDefault">Hasta</label>
                            <input type="date" name="input-date2" class="form-control" required>  
                        </div>
                    </div>

                    <br>
                    
                    <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-outline-primary">Generar</button>  
                            </div> 
                        </div>
                </form>
            
            </div>
        </div>
    </div>