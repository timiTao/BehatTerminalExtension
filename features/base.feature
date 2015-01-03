Feature: Test base functions

  Scenario: Test base

    Given Terminal execute command "ls"
    Then Terminal change working directory to "/"
    And Terminal execute command "ls"