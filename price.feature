Feature: Calculate product prices

  Background:
    Given I have a product with a base price of 1$ and a weight of 1 kilo each
    And The customer has 20.00$
    And I have 7 products
    When The customer does a transaction

  Scenario: 1 - Normal price
    Then The customer should have 13.00$

  Scenario: 2 - First at normal price, second at 50%
    Then The customer should have 14.50$

  Scenario: 3 - 5 For 3$, remaining at base price
    Then The customer should have 15.00$

  Scenario: 4 - 3 For 2$, remaining at 50% of base price
    Then The customer should have 15.50$

  Scenario: 5 - 2$ per kilo
    Then The customer should have 6.00$

  Scenario: 6 - 3 for the price of 1, remaining at base price
    Then The customer should have 16.00$
