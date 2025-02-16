<?php
class CustomerAPI {
    private $customers;

    public function __construct(DBCustomers $customers) {
        $this->customers = $customers;
    }

    public function handleRequest($apiMethod) {
        if ($apiMethod == 'GET') {
            try {
                // Validate and fetch the pagination parameters
                $page = Utils::validateIntFromGet('page');
                $limit = Utils::validateIntFromGet('limit');

                if ($page >=0 && $limit > 0) {
                    $this->getCustomers($page, $limit);
                } else {
                    $this->getCustomersAll();
                }
            } catch (ValidationException $ex) {
                echo Utils::message($ex->getMessage(), true, 400);
            } catch (Exception $ex) {
                echo Utils::message($ex->getMessage(), true, 500);
            }
        } else {
            echo Utils::message('Not allowed Method', true, 405);
        }
    }

    private function getCustomers($page, $limit) {
        $totalRows = $this->customers->fetchCount();
        $totalPages = ceil($totalRows / $limit);

        // Prevent the page number from exceeding the total pages
        if ($page > $totalPages && $totalPages > 0) {
            $page = $totalPages;  // Set to the last page if the requested page exceeds total pages
        }

        //calculate page offset
        $offset = ($page - 1) * $limit;

        // Fetch customer records with pagination
        $records = $this->customers->fetchPage($limit, $offset);
        
        $data = [
            "customers" => $records, 
            "total"=>$totalRows, 
            "totalPages"=>$totalPages, 
            "currentPage"=>$page
        ];        

        // Return the JSON-encoded response
        echo json_encode($data);
    }

    private function getCustomersAll() {
        // Fetch all customer records
        $records = $this->customers->fetchAll();

        // Prepare the data array with customers and total count
        $data = [
            "customers" => $records, 
            "total" => count($records)
        ];

        // Return the JSON-encoded response
        echo json_encode($data);
    }
}
?>