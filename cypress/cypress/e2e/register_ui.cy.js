describe('Register UI', () => {

    it('should focus on the email field when no email is provided', () => {
        cy.visit('/register')

        cy.get('button[type="submit"]').click()
        cy.get('#email').should('be.focused')
    })

    it('should focus on the email field when an invalid email is provided', () => {
        cy.visit('/register')

        cy.get('#email').type('testexample.com')

        cy.get('button[type="submit"]').click()
        cy.get('#email').should('be.focused')
    })

    it('should focus on the password field when no password is provided', () => {
        cy.visit('/register')

        cy.get('#email').type('test@example.com')

        cy.get('button[type="submit"]').click()
        cy.get('#password').should('be.focused')
    })

    it('should display an error message when the password is too short', () => {
        cy.visit('/register')

        cy.get('#email').type('test@example.com')
        cy.get('#password').type('test')

        cy.get('button[type="submit"]').click()
        cy.contains('Password must be between 7 and 255 characters.').should('be.visible')
    })

})
